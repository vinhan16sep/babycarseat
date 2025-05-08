<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostCategoryController extends AdminController
{
    /**
     * Create a PostCategoryController instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $list = PostCategory::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/post-category/index', compact('list'));
    }

    public function create() {
        $categories = PostCategory::with('children')
        ->where('level', '<', 3)
        ->orderBy('name')
        ->get();
        return view('admin/post-category/create', compact('categories'));
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        // try {

            $model = new PostCategory();
            if($request->input('parent_id')){
                $model->parent_id = $request->input('parent_id');
            }
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            if ($model->save()) {
                DB::commit();
                return redirect()->route('list-post-category')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('create-post-category')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     return redirect()->route('create-post-category')->with('error', $e->getMessage()); 
        // }
    }

    public function edit($id) {

       
        $object = PostCategory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-post-category')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $categories = PostCategory::with('children')
        ->where('id', '!=', $id) // Loại trừ bản ghi hiện tại
        ->where('level', '<', 3) // Lấy danh mục cấp 1 và cấp 2
        ->orderBy('name')
        ->get();

        return view('admin/post-category/edit', [
            'object' => $object,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        $object = PostCategory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-post-category')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {

            if($request->input('parent_id')){
                $object->parent_id = $request->input('parent_id');
            }
            $object->name = $request->input('name');
            $object->slug = $request->input('slug');

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }
                return redirect()->route('edit-post-category', ['id' => $id])->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-post-category', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-post-category', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();

        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            $object = PostCategory::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            // If object is being used elsewhere
            if ($this->isUsing($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
            }
        
            if ($object->delete()) {
                return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
            }
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
            die;

        } catch (Exception $e) {
            return response()->json(['status' => 'error','msg' => $e->getMessage()], 403);
        }
    }

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:post_category',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:post_category,slug,' . $id . ',id',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);
    }

    private function isUsing($id) {
        $count = Post::where(['category_id' => $id])->count();

        if ($count == 0) {
            return false;
        }
        return true;
    }
}
