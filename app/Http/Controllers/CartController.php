<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductColor;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function addToCart(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $colors = [];
            foreach ($product->productColors as $_item) {
                $colors[$_item->color->id] = $_item->color->name;
            }
            $qty = (int)$request->qty;
            $price = ($product->is_discount > 0) ? $product->discount_value : $product->price;
            $dataAddToCart = [
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $price,
                'weight' => 1,
                'options' => [
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'product_color_id' => $request->product_color_id,
                    'colors' => $colors,
                ]
            ];
            Cart::instance(config('cart.instance'))->add($dataAddToCart);
            list($cart, $sub_total, $count) = getDataCart(Order::DISCOUNT_PERCENT);
            $return = [
                'count' => $count,
                'sub_total' => $sub_total,
                'cart_header_html' => $this->getCartHeaderHtml($cart, $sub_total, $count),
            ];
        } catch (Throwable $e) {
            Log::error($e->getMessage());
        }
        return $return ?? false;
    }

    public function updateToCart(Request $request)
    {
        try {
            $checkDiscount = null;
            $data = $request->all();
            if (isset($data["code"])) {
                $checkDiscount = false;
                $order = Order::getOrderSuccessByPhone($request->code);
                if (session()->has('discount_code')) session()->forget('discount_code');
                if ($order) {
                    $checkDiscount = true;
                    session([ 'discount_code' => $order->order_customer->phone ]);
                }
            }
            if (!empty($data['rowid'])) {
                foreach ($data['rowid'] as $key => $value) {
                    if (!empty($value['options']['product_color_id'])) {
                        $item = Cart::instance(config('cart.instance'))->get($key);
                        $options = $item->options;
                        $options['product_color_id'] = $value['options']['product_color_id'];
                        Cart::instance(config('cart.instance'))->update($key, ['options' => $options]);
                    } else {
                        Cart::instance(config('cart.instance'))->update($key, ['qty' => (int)$value['quantity']]);
                    }
                }
            }

            list($cart, $sub_total, $count, $total, $discount_value) = getDataCart(Order::DISCOUNT_PERCENT, $checkDiscount);
            $return = [
                'check_discount_code' => $checkDiscount,
                'count' => $count,
                'sub_total' => $sub_total,
                'cart_header_html' => $this->getCartHeaderHtml($cart, $sub_total, $count)
            ];
            if (isset($data["cart_detail"])) {
                $return["order_left_html"] = $this->getOrderLeftHtml($cart, $count);
                $return["order_right_html"] = $this->getOrderRightHtml($cart, $sub_total, $count, $total, $discount_value, $request->checkout ?? null);
            }
        } catch (Throwable $e) {
            Log::error($e);
        }
        return $return ?? false;
    }

    private function getCartHeaderHtml($cart = [], $sub_total = 0, $count = 0)
    {
        return view('components.cart-footer', compact([
            'cart', 'sub_total', 'count'
        ]))->render();
    }

    private function getOrderLeftHtml($cart = [], $count = 0)
    {
        return view('components.order-cart-left', compact([
            'cart', 'count'
        ]))->render();
    }

    private function getOrderRightHtml($cart = [], $sub_total = 0, $count = 0, $total = 0, $discount_value = 0, $type = "")
    {
        return view('components.order-cart-right', compact([
            'cart', 'total', 'count', 'sub_total', 'discount_value', 'type'
        ]))->render();
    }

    private function getProductInCombo($products)
    {
        $result = [];
        foreach($products as $product) {
            $price = ($product->is_discount > 0) ? $product->discount_value : $product->price;
            $result[] = [
                'name' => $product->name,
                'qty' => $product->pivot->quantity,
                'price' => $price,
                'weight' => 1,
                'options' => [
                    'image' => $product->image,
                    'slug' => $product->slug,
                ]
            ];
        }
        return $result;
    }


    public function getQuickAdd($productId)
    {
        return [
            'product' => view('components.quick-add', [
                'product' => Product::query()->find($productId)
            ])->render()
        ];
    }
}
