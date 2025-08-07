<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class OrderController extends AdminController
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

        $q = Order::with(['order_customer', 'order_items.product'])
            ->whereHas('order_customer', function( $query ) use ( $req ){
                if (!empty($req['customer_name'])) {
                    return $query->where('name', 'LIKE', '%' . $req['customer_name'] . '%');
                }
            });

        if (isset($req['status']) && ($req['status'] === (string) Order::STATUS_PENDING || $req['status'] === (string) Order::STATUS_COMPLETED)) {
            $q->where('orders.status', (int) $req['status']);
        }
        if (!empty($req['code'])) {
            $q->where('orders.code', $req['code']);
        }
        // if (!empty($req['date_from'])) {
        //     $q->whereDate('orders.created_at', '>=', $req['date_from'] . ' 00:00:00');
        // }
        // if (!empty($req['date_to'])) {
        //     $q->whereDate('orders.created_at', '<=', $req['date_to'] . ' 23:59:59');
        // }

        $list = $q->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin/order/index', [
            'list' => $list,
            'req' => $req,
        ]);
    }

    public function detail($id) {

        // If got bad parameter(s)
        if (!isset($id) || empty($id)) {
            return redirect()->route('list-order')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }


        $object = Order::with(['order_customer', 'order_items.product'])->where(['id' => $id])->first();

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-order')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }
        // echo '<pre>';
        // print_r($object);
        // die;

        return view('admin/order/detail', [
            'object' => $object,
            'callback' => url(URL::previous())
        ]);
    }

    public function changeStatus(Request $request) {
        
        $request = $request->all();

        if (!isset($request['id']) 
            || empty($request['id']) 
            || !isset($request['status']) 
            || ($request['status'] != (string) Order::STATUS_PENDING && $request['status'] != (string) Order::STATUS_COMPLETED)) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = Order::find($request['id']);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object->status = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 200);
    }
}
