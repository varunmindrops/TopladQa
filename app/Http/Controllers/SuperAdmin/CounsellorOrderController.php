<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdersNew;
use Illuminate\Support\Facades\Response;

class CounsellorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != "") {

            $data = OrdersNew::where(function ($query) use ($request) {
                $query->where('order_no', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_phone', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payment_status', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payment_mode', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('created_at', 'DESC')->paginate(10);

            $data->appends(array(
                'search' => $request->search,
            ));
        } else {
            $data = OrdersNew::orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('admin.super-admin.counsellor-order-list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = OrdersNew::with(['orderDetailsNew.mstSubject', 'orderDetailsNew.user', 'orderDetailsNew.mstChapter', 'state'])->where('id', $id)->get()->toArray();
        return Response::json($orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
