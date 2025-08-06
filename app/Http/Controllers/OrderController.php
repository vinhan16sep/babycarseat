<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Jobs\SendOrderEmail;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
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

    public function cart(){
        list($cart, $sub_total, $count, $total, $discount_value) = getDataCart(Order::DISCOUNT_PERCENT);
        return view('order-cart', compact([
            'cart', 'sub_total', 'count', 'total', 'discount_value'
        ]));
    }


    public function orderCreate(){
        list($cart, $sub_total, $count, $total, $discount_value) = getDataCart(Order::DISCOUNT_PERCENT);
        return view('order-checkout', compact([
            'cart', 'sub_total', 'count', 'total', 'discount_value'
        ]));
    }


    public function orderStore(OrderRequest $request){
        DB::beginTransaction();
        try{
            list($cart, $sub_total, $count) = getDataCart(Order::DISCOUNT_PERCENT);
            if ($count) {
                $result = Order::create([
                    "code" => Order::generateRandomCodes(),
                    "total_price" => $sub_total,
                    "discounted_price" => 0,
                    "discount_percent" => 0,
                    "payment_method" => $request->payment_method,
                    "status" => 1,
                    "note" => $request->note
                ]);

                $result->order_customer()->create([
                    "name" => $request->name,
                    "address" => $request->address,
                    "phone" => $request->phone,
                    "email" => $request->email,
                ]);

                $OrderItemCreate = [];
                foreach ($cart as $value) {
                    $dataOrderItem = [
                        'order_id' => $result->id,
                        'quantity' => $value->qty,
                        'price' => $value->price,
                        'product_id' => $value->id,
                        'color_id' => $value->options['product_color_id'] ?? null,
                    ];
                    $OrderItemCreate[] = $dataOrderItem;
                }
                $result->order_items()->createMany($OrderItemCreate);

                Cart::instance(config('cart.instance'))->destroy();
//                $this->sendMailOrder($result->id);
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect()->route('home')->withError(__('Lỗi hệ thống, vui lòng liên hệ quản trị viên để được hỗ trợ!'));
        }

        return redirect()->route('home')->withSuccess(__('Đặt hàng thành công!'));
//        return redirect()->route('order-received', ["code" => $result->code])->withSuccess(__('Đặt hàng thành công!'));
    }

    public function orderReceived(Request $request)
    {
        $order = Order::getOrderSuccessByCode($request->code);
        if (!empty($request->code) && empty($order)) {
            return redirect(route("order-received"))->withError(__("Mã đơn hàng không tồn tại!"));
        }
        return view('order-received', compact([ 'order' ]));
    }

    private function sendMailOrder($order_id){
        return SendOrderEmail::dispatch($order_id);
    }
}
