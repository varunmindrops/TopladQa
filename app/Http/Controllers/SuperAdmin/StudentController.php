<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != "") {
            $request->validate(
                [
                    'search' => 'regex:/^([a-zA-Z0-9\.\@]+\s)*[a-zA-Z0-9\.\@]+$/'
                ],
                [
                    'search.regex' => 'Only letters, numbers, dot(.), @, single space between words are allowed.'
                ]
            );

            $data = User::where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $request->search . '%');
            })
                ->where('role', 'student')->whereNull('deleted_at')->orderBy('name', 'ASC')->paginate(10);

            $data->appends(array(
                'search' => $request->search,
            ));
        } else {
            $data = User::where('role', 'student')->whereNull('deleted_at')->orderBy('name', 'ASC')->paginate(10);
        }

        return view('admin.super-admin.student', compact('data'));
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
        $id = $request->student_id;

        $validator = Validator::make($request->all(), [
            'email' => 'unique:users,email,' . $id,
            'contact' => 'unique:users,phone,' . $id
        ]);

        if ($validator->fails()) {
            $msg = 'E-mail or contact already exists!';
            return redirect()->route('student.index')->with('error', $msg);
        } else {
            User::updateOrCreate(['id' => $id], ['name' => $request->name, 'email' => $request->email, 'phone' => $request->contact]);
            if (empty($id))
                $msg = 'Some error occurred!';
            else
                $msg = 'Student data is updated successfully';

            return redirect()->route('student.index')->with('success', $msg);
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
        $orders = Order::with(['user', 'orderDetails.product.user', 'orderDetails.mstAttempt', 'orderDetails.mstLanguage', 'orderDetails.videoDeliveryType', 'orderDetails.bookDeliveryType'])->where('user_id', $id)->where('payment_status', 'successful')->whereNull('deleted_at')->get();
        return Response::json($orders);
        //return view('admin.super-admin.student', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return Response::json($user);
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
        $user = User::where('id', $id)->delete();
        return Response::json($user);
        //return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
}
