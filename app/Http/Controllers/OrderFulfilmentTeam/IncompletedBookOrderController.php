<?php

namespace App\Http\Controllers\OrderFulfilmentTeam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdersNew;
use Illuminate\Support\Facades\Response;



class IncompletedBookOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != "") {

            $data = OrdersNew::where('payment_status', 'successful')->where(function ($query) use ($request) {
                $query->where('order_no', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_phone', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payment_status', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payment_mode', 'LIKE', '%' . $request->search . '%');
            })
            ->whereNotNull('counsellor_id')->orderBy('created_at', 'DESC')->where('book_deliver_status',0)->paginate(10);

            $data->appends(array(
                'search' => $request->search,
            ));
        } else {
            $data = OrdersNew::where('payment_status', 'successful')->whereNotNull('counsellor_id')->orderBy('created_at', 'DESC')->where('book_deliver_status',0)->paginate(10);
        }

        $all = OrdersNew::where('payment_status', 'successful')->whereNotNull('counsellor_id')->count();
        $pending = OrdersNew::where('payment_status', 'successful')->whereNotNull('counsellor_id')->where('deliver_status', 0)->count();
        $approve = OrdersNew::where('payment_status', 'successful')->whereNotNull('counsellor_id')->where('deliver_status', 1)->count();

        return view('admin.super-admin.incomplete-book-order', compact('data', 'all', 'pending', 'approve'));
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
        //
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
        
        if($request->type=='complete')
        {
            $order = OrdersNew::where('id', $request->id)->update(
                ['deliver_status' => $request->status,]
            );
        }
        else if($request->type=='book')
        {
            $order = OrdersNew::where('id', $request->id)->update(['book_deliver_status' => $request->status]);
        }
        else{
            $order = OrdersNew::where('id', $request->id)->update(['video_deliver_status' => $request->status]);
        }
        return Response::json($order);
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
