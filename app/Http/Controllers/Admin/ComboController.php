<?php

namespace App\Http\Controllers\Admin;

use App\Models\Combo;
use App\Models\ComboProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ComboController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {

        $req = $request->all();

        $q = Combo::whereRaw('1 = 1');

        // Tên sản phẩm
        if (isset($req['name']) && $req['name']) {
            $q->where('name', 'LIKE', '%' . $req['name'] . '%');
        }

        // Giảm giá
        if (isset($req['is_discount']) && $req['is_discount'] == '1') {
            $q->where('is_discount', 1);
        } else if (isset($req['is_discount']) && $req['is_discount'] == '0') {
            $q->where('is_discount', 0);
        }

        // Sản phẩm mới
        if (isset($req['is_new']) && $req['is_new'] == '1') {
            $q->where('is_new', 1);
        } else if (isset($req['is_new']) && $req['is_new'] == '0') {
            $q->where('is_new', 0);
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

        $list = $q->orderBy('id', 'desc')->paginate(10)->withQueryString();

        $products = Product::where(['is_active' => 1])->get();

        return view('admin/combo/index', [
            'list' => $list,
            'req' => $req,
            'products' => $products
        ]);
    }

    public function create() {
        $products = Product::where(['is_active' => 1])->get();
        $prods = [];
        foreach ($products as $item) {
            $prods[] = [
                'id' => $item->id,
                'name' => $item->name
            ];
        }
        return view('admin/combo/create', [
            'products' => json_encode($prods)
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new Combo();
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->description = $request->input('description');
            $model->price = $request->input('price');
            $model->is_discount = $request->input('is_discount');
            $model->discount_value = $request->input('discount_value');
            $model->is_active = $request->input('is_active');
            $model->is_new = $request->input('is_new');
            $model->is_highlight = $request->input('is_highlight');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.COMBO_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request);
                $model->image = $upload;
                $model->save();
    
                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-combo')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
            }
            DB::rollBack();
            return redirect()->route('create-combo')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-combo')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {
        $object = Combo::find($id);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-combo')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/combo/edit', [
            'object' => $object,
            'activedCountries' => $this->activedCountries,
            'activedRegions' => $this->activedRegions,
            'activedTypes' => $this->activedTypes,
            'activedGrapes' => $this->activedGrapes,
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = Combo::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-combo')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {
            $object->name = $request->input('name');
            $object->slug = $request->input('slug');
            $object->description = $request->input('description');
            $object->price = $request->input('price');
            $object->is_discount = $request->input('is_discount');
            $object->discount_value = $request->input('discount_value');
            $object->is_active = $request->input('is_active');
            $object->is_new = $request->input('is_new');
            $object->is_highlight = $request->input('is_highlight');
            $object->created_by = 1;
            $object->updated_by = 1;
                
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.COMBO_IMAGE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request, $prevImg);
                $object->image = $upload;
            }

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-combo', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-combo', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-combo', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Combo::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($this->checkInUse($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
        }

        DB::beginTransaction();

        if ($object->delete()) {

            $delComboProds = ComboProduct::where(['combo_id' => $request['id']])->delete();

            if ($delComboProds) {
                DB::commit();
                return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
            }
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
        }
        DB::rollBack();
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function changeStatus(Request $request) {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Combo::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }
        
        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->checkInUse($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 404);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function addProduct(Request $request) {
        $model = new ComboProduct;
        $model->combo_id = $request->input('combo_id');
        $model->product_id = $request->input('product_id');
        $model->quantity = $request->input('quantity');
        if ($model->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CREATE_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function getProducts(Request $request) {
        $comboId = $request->input('combo_id');
        $res = [];
        $prods = ComboProduct::with(['product'])->where(['combo_id' => $comboId])->get();
        if ($prods->count()) {
            $res = $prods->toArray();
        }
        return response()->json(['status' => 'success','msg' => '', 'data' => $res], 200);
    }

    public function getUnselectedProducts(Request $request) {
        $comboId = $request->input('combo_id');
        $selected = [];
        $prods = ComboProduct::with(['product'])->where(['combo_id' => $comboId])->get();
        if ($prods->count()) {
            $selected = array_column($prods->toArray(), 'product_id');
        }
        $products = Product::where(['is_active' => 1])->whereNotIn('id', $selected)->get();
        $unselProds = [];
        foreach ($products as $item) {
            $unselProds[] = [
                'id' => $item->id,
                'name' => $item->name
            ];
        }
        return response()->json(['status' => 'success','msg' => '', 'data' => $unselProds], 200);
    }

    
    public function changeProducts(Request $request) {
        $req = $request->all();
        $comboId = $req['combo_id'];
        $productIds = $req['product_ids'];
        $productQunt = $req['product_quantity'];

        DB::beginTransaction();
        
        $del = ComboProduct::where(['combo_id' => $comboId])->delete();

        if ($del) {
            $insArr = [];
            if (isset($req['product_ids']) && isset($req['product_quantity'])) {
                foreach ($productIds as $key => $item) {
                    $insArr[] = [
                        'combo_id' => $comboId,
                        'product_id' => $item,
                        'quantity' => $productQunt[$key]
                    ];
                }
            }
            $ins = ComboProduct::insert($insArr);
            if ($ins) {
                DB::commit();
                return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.UPDATE_SUCCEEDED')], 200);
            }
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
        } else {
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
        }
    }

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:combo',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'discount_value' => 'nullable|numeric',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.required' => 'Chưa chọn ảnh',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
            'price.required' => 'Chưa chọn đơn giá',
            'price.numeric' => 'Đơn giá phải là số',
            'discount_value.numeric' => 'Giá khuyến mãi phải là số',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:combo,slug,' . $id . ',id',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'discount_value' => 'nullable|numeric',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
            'price.required' => 'Chưa chọn đơn giá',
            'price.numeric' => 'Đơn giá phải là số',
            'discount_value.numeric' => 'Giá khuyến mãi phải là số',
        ]);
    }

    private function checkInUse($id) {
        return false;
    }
}
