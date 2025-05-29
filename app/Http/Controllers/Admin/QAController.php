<?php

namespace App\Http\Controllers\Admin;

use App\Models\QAs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class QAController extends AdminController
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
        // lấy tất cả câu hỏi thường gặp và sort theo qa_type và sort ak có filter theo qa_type
        $req = $request->all();
        $q = QAs::query();
        if (isset($req['qa_type']) && !empty($req['qa_type'])) {
            $q->where('qa_type', $req['qa_type']);
        }
        $q->orderBy('qa_type', 'asc')
            ->orderBy('sort', 'asc');
        $q = $q->paginate(Config::get('constants.PAGINATE'));
        
        return view('admin/qa/index', [
            'list' => $q,
            'req' => $req,
            'qaTypes' => Config::get('constants.QA_TYPE')
        ]);
    }

    public function create()
    {
        return view('admin/qa/create', [
            'qaTypes' => Config::get('constants.QA_TYPE')
        ]);
    }

    public function store(Request $request)
    {
        $this->validateStore($request);

        try {
            $model = new QAs();
            $model->qa_type = $request->input('qa_type');
            $model->question = $request->input('question');
            $model->answer = $request->input('answer');
            $model->sort = $request->input('sort') ?? $model->getNextSortValue($request->input('qa_type'));
            $model->is_active = $request->input('is_active');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                return redirect()->route('list-qa')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
            }
        } catch (Exception $e) {
            return redirect()->route('create-qa')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $object = QAs::find($id);        

        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-qa')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/qa/edit', [
            'object' => $object,
            'qaTypes' => Config::get('constants.QA_TYPE')
        ]);
    }

    public function update(Request $request, $id)
    {
        $object = QAs::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);
        try {
            $object->qa_type = $request->input('qa_type');
            $object->question = $request->input('question');
            $object->answer = $request->input('answer');
            $object->sort = $request->input('sort') ?? $object->getNextSortValue($request->input('qa_type'));
            $object->is_active = $request->input('is_active');
            $object->updated_by = 1;
            $object->created_by = $object->created_by ?? 1; 

           
            if ($object->save()) {
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }
                return redirect()->route('list-qa', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            
        } catch (Exception $e) {
            return redirect()->route('edit-qa', [
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

        $object = QAs::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

    
        DB::beginTransaction();

        try {
           
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

        $object = QAs::find($request['id']);

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
            'qa_type' => 'required',
            'question' => 'required|max:255',
            'answer' => 'required',
            'sort' => 'nullable|numeric',
        ], [
            'qa_type.required' => 'Chưa chọn loại câu hỏi',
            'question.required' => 'Chưa nhập câu hỏi',
            'question.max' => 'Câu hỏi không được quá 255 ký tự',
            'answer.required' => 'Chưa nhập câu trả lời',
            'sort.numeric' => 'Sắp xếp phải là số',
        ]);
    }

    private function validateUpdate($request, $id)
    {
        $this->validate($request, [
            'qa_type' => 'required',
            'question' => 'required|max:255',
            'answer' => 'required',
            'sort' => 'nullable|numeric'
        ], [
            'qa_type.required' => 'Chưa chọn loại câu hỏi',
            'question.required' => 'Chưa nhập câu hỏi',
            'question.max' => 'Câu hỏi không được quá 255 ký tự',
            'answer.required' => 'Chưa nhập câu trả lời',
            'sort.numeric' => 'Sắp xếp phải là số'
        ]);
    }

    private function checkInUse($id)
    {
        return false;
    }
}
