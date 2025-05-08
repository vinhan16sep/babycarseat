<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class PostController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $list = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/post/index', compact('list'));
    }

    public function create() {
        $categories = PostCategory::with('children')
        ->orderBy('name')
        ->where(["is_active" => 1])
        ->get();
        return view('admin/post/create', compact('categories'));
    }

    public function store(Request $request) {

        $this->validateStore($request);

        try {
            $model = new Post();
            $model->category_id = $request->input('category_id') ?? NULL;
            $model->title = $request->input('title');
            $model->slug = $request->input('slug');
            $model->position = $request->input('position');
            $model->sort = $request->input('sort') ?? 0;
            $model->description = $request->input('description');
            $model->content = $request->input('content');
            $model->is_active = $request->input('is_active');
            $model->menu_active = $request->input('menu_active') ?? 0;
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                return redirect()->route('list-post')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
            }
            return redirect()->route('create-post')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            return redirect()->route('create-post')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {

        $object = Post::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-post')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $categories = PostCategory::with('children')
        ->where(["is_active" => 1])
        ->orderBy('name')
        ->get();

        return view('admin/post/edit', [
            'object' => $object,
            'categories' => $categories,
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = Post::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-post')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        try {
            $object->title = $request->input('title');
            $object->category_id = $request->input('category_id') ?? NULL;
            $object->slug = $request->input('slug');
            $object->position = $request->input('position');
            $object->sort = $request->input('sort') ?? 0;
            $object->description = $request->input('description');
            $object->content = $request->input('content');
            $object->is_active = $request->input('is_active');
            $object->menu_active = $request->input('menu_active') ?? 0;
            $object->updated_by = 1;

            if ($object->save()) {
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-post', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            return redirect()->route('edit-post', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            return redirect()->route('edit-post', [
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
    
            $object = Post::find($request['id']);
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

        } catch (Exception $e) {
            return redirect()->route('create-post')->with('error', $e->getMessage()); 
        }
    }

    public function changeStatus(Request $request) {
        
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = Post::find($request['id']);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }
        
        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->isUsing($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 200);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 200);
    }

    private function validateStore($request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:posts',
            'position' => 'required'
        ], [
            'title.required' => 'Chưa nhập tiêu đề',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'position.required' => 'Chưa có vị trí'
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:posts,slug,' . $id . ',id',
            'position' => 'required'
        ], [
            'title.required' => 'Chưa nhập tiêu đề',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'position.required' => 'Chưa có vị trí'
        ]);
    }

    private function isUsing($id) {
        return false;
    }
}
