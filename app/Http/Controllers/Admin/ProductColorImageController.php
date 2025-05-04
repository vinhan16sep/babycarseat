<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductColorImageController extends AdminController
{

    public function index(Request $request) {
        $list = ProductColor::with(['product', 'color'])->where('product_id', $request['id'])->orderBy('updated_at', 'desc')->get();
        return view(
            'admin/product-color-images/index', 
            [
                'list' => $list,
                'productId' => $request['id']
            ]
        );
    }

    public function create(Request $request)
    {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id'])) {
            return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }
        
        
        if (!isset($request['color']) || empty($request['color'])) {
            $product = Product::where('id', $request['id'])->first();
            if ($product == null || empty($product)) {
                return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
            }
    
            $colors = Color::all();
            return view(
                'admin/product-color-images/create',
                [
                    'isCreate' => 1,
                    'product' => $product,
                    'colors' => $colors,
                    'colorImage' => []
                ]
            );
        } else {
            $product = Product::where('id', $request['id'])->first();
            if ($product == null || empty($product)) {
                return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
            }
            
            $color = Color::where(['id' => $request['color']])->first();
            $colorImage = ProductColor::with(['product', 'color'])
                                        ->where('product_id', $request['id'])
                                        ->where('color_id', $request['color'])
                                        ->orderBy('updated_at', 'desc')->get();

            return view(
                'admin/product-color-images/create',
                [
                    'isCreate' => 0,
                    'product' => $product,
                    'colorName' => $color->name,
                    'colorId' => $request['color'],
                    'colorImage' => $colorImage
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        DB::beginTransaction();

        try {

            $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_COLOR_IMAGE'), $request->input('product_id'), $request->input('color_id'));
            $exist = ProductColor::where(['product_id' => $request->input('product_id'), 'color_id' => $request->input('color_id')])->first();
            if (!empty($exist)) {
                if ($this->deleteImage($path)) {
                    if ($request->hasfile('images')) {
                        
                        $uploads = $this->uploadImages($path, $request, 'images');
                        $exist->image = json_encode($uploads, JSON_UNESCAPED_SLASHES);
            
                        if ($exist->save()) {
                            DB::commit();
                            return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                        }
                        DB::rollBack();
                        return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_1"));
                    }
                }
            } else {
                $productColor = new ProductColor();
                $productColor->product_id = $request->input('product_id');
                $productColor->color_id = $request->input('color_id');
                if ($productColor->save()) {
                    if ($request->hasfile('images')) {
                        
                        $uploads = $this->uploadImages($path, $request, 'images');
                        $productColor->image = json_encode($uploads, JSON_UNESCAPED_SLASHES);
                        
                        if ($productColor->save()) {
                            DB::commit();
                            return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                        }
                        DB::rollBack();
                        return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_2"));
                    }

                }
                DB::rollBack();
                return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_3"));
            }
            DB::rollBack();
            return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_4"));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('list-product-color-image', ['id' => $request->input('product_id')])->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $productColor = ProductColor::with('product', 'color', 'images')->findOrFail($id);
        return view('images.edit', compact('productColor'));
    }

    public function delete(Request $request) {
        $request = $request->all();

        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            $object = ProductColor::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            DB::beginTransaction();
            
            if ($object->delete()) {
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_COLOR_IMAGE'), $object->product_id, $object->color_id);
                $delImageStt = $this->deleteImage($path);
                if ($delImageStt) {
                    DB::commit();
                    return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
                }
            }
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('list-product-color-image')->with('error', $e->getMessage()); 
        }
    }

    public function getColorsByProduct(Request $request)
    {
        $request = $request->all();

        if (!isset($request['productId']) || empty($request['productId'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $colors = ProductColor::join('colors', 'product_colors.color_id', '=', 'colors.id')
            ->where('product_colors.product_id', $request['productId'])
            ->select('colors.id', 'colors.name')
            ->distinct()
            ->get();

        return response()->json(['status' => 'success', 'data' => $colors], 200);
    }

    private function validateStore($request)
    {
        $this->validate($request, [
            'color_id' => 'required',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'color_id.required' => 'Chưa chọn màu sắc',
            'images.required' => 'Chưa chọn ảnh',
            'images.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'images.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'images.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }
}
