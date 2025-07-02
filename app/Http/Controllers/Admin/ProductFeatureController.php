<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductFeature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductFeatureController extends AdminController
{

    public function index(Request $request) {
        $list = ProductFeature::with(['product', 'feature'])->where('product_id', $request['id'])->orderBy('updated_at', 'desc')->get();
        return view(
            'admin/product-feature/index', 
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
        
        
        if (!isset($request['feature']) || empty($request['feature'])) {
            $product = Product::where('id', $request['id'])->first();
            if ($product == null || empty($product)) {
                return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
            }
    
            $feature = Feature::all();
    
            return view(
                'admin/product-feature/create',
                [
                    'isCreate' => 1,
                    'product' => $product,
                    'feature' => $feature,
                ]
            );
        } else {
            $product = Product::where('id', $request['id'])->first();
            if ($product == null || empty($product)) {
                return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
            }
            
            $feature = Feature::where(['id' => $request['feature']])->first();
            return view(
                'admin/product-feature/create',
                [
                    'isCreate' => 0,
                    'product' => $product,
                    'featureTitle' => $feature->title,
                    'featureId' => $request['feature'],
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        DB::beginTransaction();

        try {

            $exist = ProductFeature::where(['product_id' => $request->input('product_id'), 'feature_id' => $request->input('feature_id')])->first();
            if (empty($exist)) {
                $productFeature = new ProductFeature();
                $productFeature->product_id = $request->input('product_id');
                $productFeature->feature_id = $request->input('feature_id');
                if ($productFeature->save()) {
                    if ($productFeature->save()) {
                        DB::commit();
                        return redirect()->route('list-product-feature', ['id' => $request->input('product_id')])->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                    }
                    DB::rollBack();
                    return redirect()->route('list-product-feature', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_2"));
                }
                DB::rollBack();
                return redirect()->route('list-product-feature', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_3"));
            }
            DB::rollBack();
            return redirect()->route('list-product-feature', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_4"));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('list-product-feature', ['id' => $request->input('product_id')])->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $productFeature = ProductFeature::with('product', 'feature')->findOrFail($id);
        return view('images.edit', compact('productFeature'));
    }

    // public function destroy($id)
    // {
    //     $image = ProductColorImage::findOrFail($id);
    //     \Storage::disk('public')->delete($image->image_path);
    //     $image->delete();

    //     return back()->with('success', 'Xóa ảnh thành công!');
    // }

    public function delete(Request $request)
    {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = ProductFeature::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        if ($object->delete()) {
            return response()->json(['status' => 'success', 'msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function getFeatureByProduct(Request $request)
    {
        $request = $request->all();

        if (!isset($request['productId']) || empty($request['productId'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $feature = ProductFeature::join('feature', 'product_feature.feature_id', '=', 'feature.id')
            ->where('product_feature.product_id', $request['productId'])
            ->select('feature.id', 'feature.name')
            ->distinct()
            ->get();

        return response()->json(['status' => 'success', 'data' => $feature], 200);
    }

    public function getFeatureById(Request $request)
    {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $feature = Feature::where('id', $request['id'])->first();

        if ($feature) {
            return response()->json(['status' => 'success', 'data' => $feature], 200);
        }
        return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
    }


    private function validateStore($request)
    {
        $this->validate($request, [
            'feature_id' => 'required'
        ], [
            'feature_id.required' => 'Chưa chọn tính năng'
        ]);
    }
}
