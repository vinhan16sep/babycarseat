<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ProductController extends AdminController
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

    public function index(Request $request)
    {
        $req = $request->all();

        $q = Product::with(['categories', 'brand', 'productColors.color']);

        if (isset($req['name']) && $req['name']) {
            $q->where('name', 'LIKE', '%' . $req['name'] . '%');
        }

        if (isset($req['quantity_status']) && $req['quantity_status'] == '1') {
            $q->where('quantity', '>', 0);
        } else if (isset($req['quantity_status']) && $req['quantity_status'] == '0') {
            $q->where('quantity', 0);
        }

        if (isset($req['category']) && $req['category']) {
            $q->whereHas('categories', function ($query) use ($req) {
                $query->where('product_categories.id', $req['category']);
            });
        }

        if (isset($req['brand']) && $req['brand']) {
            $q->where('brand_id', $req['brand']);
        }

        // Sản phẩm nổi bật
        if (isset($req['is_highlight']) && $req['is_highlight'] == '1') {
            $q->where('is_highlight', 1);
        } else if (isset($req['is_highlight']) && $req['is_highlight'] == '0') {
            $q->where('is_highlight', 0);
        }

        // Kích hoạt
        if (isset($req['is_active']) && $req['is_active'] == '1') {
            $q->where('is_active', 1);
        } else if (isset($req['is_active']) && $req['is_active'] == '0') {
            $q->where('is_active', 0);
        }

        $list = $q->orderBy('sort', 'asc')->paginate(10)->withQueryString();
        return view('admin/product/index', [
            'list' => $list,
            'req' => $req,
            'productCategories' => $this->productCategories,
            'brands' => $this->brands
        ]);
    }

    public function create()
    {
        $colors = Color::whereNotIn('id', ProductColor::pluck('color_id'))->get();

        $seo = (object)[
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'meta_robots' => '',
            'canonical_url' => '',
            'og_title' => '',
            'og_description' => '',
        ];

        return view('admin/product/create', [
            'productCategories' => $this->productCategories,
            'brands' => $this->brands,
            'colors' => $colors,
            'seo' => $seo,
        ]);
    }

    public function store(Request $request)
    {
        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new Product();
            $model->brand_id = $request->input('brand_id');
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->note = $request->input('note');
            $model->detail = $request->input('detail');
            $model->specification = $request->input('specification');
            $model->guide = $request->input('guide');
            $model->description = $request->input('description');
            // $model->content = $request->input('content');
            $model->price = $request->input('price');
            $model->discount_value = $request->input('discount_value');
            $model->is_active = $request->input('is_active');
            $model->is_highlight = $request->input('is_highlight');
            $model->created_by = 1;
            $model->updated_by = 1;
            // SEO fields
            $model->meta_title = $request->input('meta_title');
            $model->meta_description = $request->input('meta_description');
            $model->meta_keywords = $request->input('meta_keywords');
            $model->meta_robots = $request->input('meta_robots');
            $model->canonical_url = $request->input('canonical_url');
            $model->og_title = $request->input('og_title');
            $model->og_description = $request->input('og_description'); 

            if ($model->save()) {
                $categories = $request->input('category_id');
                $model->categories()->sync($categories);

                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request);
                $model->image = $upload;
                $model->save();

                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-product')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
                DB::rollBack();
                return redirect()->route('create-product')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
            }
            DB::rollBack();
            return redirect()->route('create-product')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-product')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $object = Product::with('productColors')->findOrFail($id);
        $colors = Color::whereNotIn('id', ProductColor::pluck('color_id'))->get();

        $selectedColors = $object->productColors->pluck('color_id')->toArray() ?? [];
        $colors = Color::whereNotIn('id', ProductColor::whereNotIn('color_id', $selectedColors)->pluck('color_id'))->get();

        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $seo = [
            'meta_title' => $object->meta_title ?? '',
            'meta_description' => $object->meta_description ?? '',
            'meta_keywords' => $object->meta_keywords ?? '',
            'meta_robots' => $object->meta_robots ?? '',
            'canonical_url' => $object->canonical_url ?? '',
            'og_title' => $object->og_title ?? '',
            'og_description' => $object->og_description ?? '',
        ];

        return view('admin/product/edit', [
            'object' => $object,
            'productCategories' => $this->productCategories,
            'brands' => $this->brands,
            'colors' => $colors,
            'selectedColors' => $selectedColors,
            'callback' => url(URL::previous()),
            'seo' => $seo,
        ]);
    }

    public function update(Request $request, $id)
    {
        $object = Product::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {
            $object->brand_id = $request->input('brand_id');
            $object->name = $request->input('name');
            $object->slug = $request->input('slug');
            $object->note = $request->input('note');
            $object->detail = $request->input('detail');
            $object->specification = $request->input('specification');
            $object->description = $request->input('description');
            $object->guide = $request->input('guide');
            // $object->content = $request->input('content');
            $object->price = $request->input('price');
            $object->discount_value = $request->input('discount_value');
            $object->is_active = $request->input('is_active');
            $object->is_highlight = $request->input('is_highlight');
            $object->updated_by = 1;
            // SEO fields
            $object->meta_title = $request->input('meta_title');
            $object->meta_description = $request->input('meta_description');
            $object->meta_keywords = $request->input('meta_keywords');
            $object->meta_robots = $request->input('meta_robots');
            $object->canonical_url = $request->input('canonical_url');
            $object->og_title = $request->input('og_title');
            $object->og_description = $request->input('og_description'); 

            if ($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_IMAGE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request);
                $object->image = $upload;
            }

            if ($object->save()) {
                // Đồng bộ danh mục vào bảng trung gian
                $categories = $request->input('category_id');
                $object->categories()->sync($categories);

                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-product', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-product', [
                'id' => $id,
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-product', [
                'id' => $id,
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Product::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($this->checkInUse($request['id'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
        }

        DB::beginTransaction();

        try {
            // Xóa sản phẩm và các bản ghi liên quan trong bảng trung gian
            $object->categories()->detach(); // Xóa các liên kết trong bảng trung gian
            if ($object->delete()) {
                DB::commit();
                return response()->json(['status' => 'success', 'msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
            }
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()], 500);
        }
    }

    public function changeStatus(Request $request)
    {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Product::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->checkInUse($request['id'])) {
                return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 404);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success', 'msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    private function validateStore($request)
    {
        $this->validate($request, [
            'category_id' => 'required|array',
            'category_id.*' => 'exists:product_categories,id', // Sửa lại tên bảng
            'brand_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:products',
            'price' => 'required|numeric',
            'meta_title' => 'max:70',
            'meta_description' => 'max:160',
            'meta_keywords' => 'max:255',
            'meta_robots' => 'max:255', 
            'canonical_url' => 'max:255',
            'og_title' => 'max:60',
            'og_description' => 'max:110',
        ], [
            'category_id.required' => 'Chưa chọn danh mục',
            'category_id.array' => 'Danh mục không hợp lệ',
            'category_id.*.exists' => 'Danh mục không tồn tại',
            'brand_id.required' => 'Chưa chọn thương hiệu',
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'price.required' => 'Chưa chọn đơn giá',
            'price.numeric' => 'Đơn giá phải là số',
        ]);
    }

    private function validateUpdate($request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|array',
            'category_id.*' => 'exists:product_categories,id',
            'brand_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:products,slug,' . $id . ',id',
            'image.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
        ], [
            'category_id.required' => 'Chưa chọn danh mục',
            'category_id.array' => 'Danh mục không hợp lệ',
            'brand_id.required' => 'Chưa chọn thương hiệu',
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
            'price.required' => 'Chưa chọn đơn giá',
            'price.numeric' => 'Đơn giá phải là số',
        ]);
    }

    private function checkInUse($id)
    {
        return false;
    }
}
