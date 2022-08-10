<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Redirect, Illuminate\Support\Facades\Response;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 'teacher')->whereNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $action = '<button title="View" type="submit" class="table_btn edit_linker view-teacher" data-toggle="modal" data-id='.$row->id.'><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                        <button title="Login" type="submit" class="table_btn login_linkerr stealth-login-btn" data-user_id='.$row->id.'><span><i class="fa fa-sign-in" aria-hidden="true"></i></span></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button title="Delete" type="submit" data-id='.$row->id.' class="table_btn trash_linker delete-teacher" data-confirm="Are you sure you want to delete this teacher?"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>';
                        
                        if($row->status == 0)
                        {
                            $action .= '<button title="Deactive" class="table_btn edit_linker off_switch" data-id='.$row->id.' data-status='.$row->status.' data-confirm="Are you sure you want to activate this teacher?" type="button"><span><i class="fa fa-toggle-off" aria-hidden="true"></i></span></button>';
                        }
                        elseif($row->status == 1)
                        {
                            $action .= '<button title="Active" class="table_btn edit_linker on_switch" data-id='.$row->id.' data-status='.$row->status.' data-confirm="Are you sure you want to deactivate this teacher?" type="button"><span><i class="fa fa-toggle-on" aria-hidden="true"></i></span></button>';
                        }
                        return $action;
                        
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.super-admin.teacher');
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
        $user = User::with(['product.subject','product.productPrice.attempt','product.productPrice.videoDeliveryType','product.productPrice.bookDeliveryType','product.videoLanguage.mstLanguage'])->where('role', 'teacher')->where('status', 1)->whereNull('deleted_at')->where('id', $id)->first();
        return Response::json($user);
        //return view('teacher.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->update(['status' => $request->status]);
        return Response::json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->delete();
        return Response::json($user);
        //return redirect()->route('teacher.index');
    }
}
