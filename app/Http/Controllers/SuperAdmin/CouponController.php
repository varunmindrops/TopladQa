<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Yajra\DataTables\Facades\DataTables;
use Redirect, Illuminate\Support\Facades\Response;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Coupon::whereNull('deleted_at')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $action = '<button title="Edit" type="submit" class="table_btn edit_linker edit-coupon" data-toggle="modal" data-id=' . $row->id . '><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button title="Delete" type="submit" data-id=' . $row->id . ' class="table_btn trash_linker delete-coupon" data-confirm="Are you sure you want to delete this coupon?"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.super-admin.coupon');
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
        $id = $request->coupon_id;

        $validator = Validator::make($request->all(), [
            'name' => 'unique:coupons,name,' . $id
        ]);

        if ($validator->fails()) {
            $msg = 'Coupon name already exists!';
            return redirect()->route('coupon.index')->with('error', $msg);
        } else {
            Coupon::updateOrCreate(['id' => $id], ['name' => $request->name, 'code' => $request->code, 'type' => $request->type, 'value' => $request->value, 'expiry_date' => $request->expiry_date]);
            if (empty($id))
                $msg = 'Coupon created successfully.';
            else
                $msg = 'Coupon data is updated successfully';

            return redirect()->route('coupon.index')->with('success', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        return Response::json($coupon);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::where('id', $id)->delete();
        return Response::json($coupon);
        //return redirect()->route('coupon.index');
    }
}
