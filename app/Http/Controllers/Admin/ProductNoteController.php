<?php

namespace App\Http\Controllers\Admin;

use App\Models\Note;
use App\Models\Product;
use App\Models\ProductNote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductNoteController extends AdminController
{

    public function index(Request $request) {
        $list = ProductNote::with(['product', 'note'])->where('product_id', $request['id'])->orderBy('updated_at', 'desc')->get();
        return view(
            'admin/product-note/index', 
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
        
        
        if (!isset($request['note']) || empty($request['note'])) {
            $product = Product::where('id', $request['id'])->first();
            if ($product == null || empty($product)) {
                return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
            }
    
            $note = Note::all();
    
            return view(
                'admin/product-note/create',
                [
                    'isCreate' => 1,
                    'product' => $product,
                    'note' => $note,
                ]
            );
        } else {
            $product = Product::where('id', $request['id'])->first();
            if ($product == null || empty($product)) {
                return redirect()->route('list-product')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
            }
            
            $note = Note::where(['id' => $request['note']])->first();
            return view(
                'admin/product-note/create',
                [
                    'isCreate' => 0,
                    'product' => $product,
                    'noteName' => $note->name,
                    'noteId' => $request['note'],
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        DB::beginTransaction();

        try {

            $exist = ProductNote::where(['product_id' => $request->input('product_id'), 'note_id' => $request->input('note_id')])->first();
            if (empty($exist)) {
                $ProductNote = new ProductNote();
                $ProductNote->product_id = $request->input('product_id');
                $ProductNote->note_id = $request->input('note_id');
                if ($ProductNote->save()) {
                    if ($ProductNote->save()) {
                        DB::commit();
                        return redirect()->route('list-product-note', ['id' => $request->input('product_id')])->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                    }
                    DB::rollBack();
                    return redirect()->route('list-product-note', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_2"));
                }
                DB::rollBack();
                return redirect()->route('list-product-note', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_3"));
            }
            DB::rollBack();
            return redirect()->route('list-product-note', ['id' => $request->input('product_id')])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR' . "_4"));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('list-product-note', ['id' => $request->input('product_id')])->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $productNote = ProductNote::with('product', 'note')->findOrFail($id);
        return view('images.edit', compact('productNote'));
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

        $object = ProductNote::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        if ($object->delete()) {
            return response()->json(['status' => 'success', 'msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function getNoteByProduct(Request $request)
    {
        $request = $request->all();

        if (!isset($request['productId']) || empty($request['productId'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $note = ProductNote::join('note', 'product_note.note_id', '=', 'note.id')
            ->where('product_note.product_id', $request['productId'])
            ->select('note.id', 'note.name')
            ->distinct()
            ->get();

        return response()->json(['status' => 'success', 'data' => $note], 200);
    }

    private function validateStore($request)
    {
        $this->validate($request, [
            'note_id' => 'required'
        ], [
            'note_id.required' => 'Chưa chọn tính năng'
        ]);
    }
}
