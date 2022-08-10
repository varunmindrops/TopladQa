<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstCourse;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Illuminate\support\Str;

class ScholarshipController extends Controller
{
    private $razorpayId;
    private $razorpayKey;

    public function __construct()
    {
        $this->razorpayId = config('razorpay.razorpayId');
        $this->razorpayKey = config('razorpay.razorpayKey');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MstCourse::where('status', '1')->whereNull('deleted_at')->get();

        return view('site.scholarship', compact('data'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
                'email' => 'required|email:rfc,dns',
                'phone' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/',
                'course_type' => 'required',
                'combo_type' => 'required',
                'course' => 'required',
                'marks' => 'required|numeric|between:0,9999.99|regex:/^\d*(\.\d{1,2})?$/|lte:max_marks',
                'max_marks' => 'required|numeric|between:1,9999.99|regex:/^\d*(\.\d{1,2})?$/',
                'percentage' => 'required|numeric',
                'registration_no' => 'required|regex:/^\S*$/|unique:scholarship_details',
                'roll_no' => 'required|numeric',
                'date' => 'required',
                'id_proof' => 'required|mimes:png,jpeg,jpg,pdf|max:2000',
                'marksheet' => 'required|mimes:png,jpeg,jpg,pdf|max:2000'
            ],
            [
                'name.regex' => 'Only letters, dot(.), single space between words are allowed.',
                'phone.required' => 'Mobile number is required.',
                'phone.digits' => 'Mobile number must be :digits digits.',
                'phone.regex' => 'Mobile number is invalid.',
                'course_type.required' => 'Course name is required.',
                'combo_type.required' => 'Combo name is required.',
                'course.required' => 'Qualifying course is required.',
                'marks.regex' => 'Max. two decimal precision allowed.',
                'marks.between' => 'Max. four digit number allowed.',
                'max_marks.regex' => 'Max. two decimal precision allowed.',
                'max_marks.between' => 'Max. four digit number allowed.',
                'registration_no.required' => 'Registration number is required.',
                'registration_no.regex' => 'Whitespaces are not allowed.',
                'registration_no.unique' => 'Registration number has already been taken.',
                'roll_no.required' => 'Roll number is required.',
                'roll_no.numeric' => 'Roll number must be a number.',
                'id_proof.required' => 'Please choose a file to upload.',
                'marksheet.required' => 'Please choose a file to upload.'
            ]
        );

        if ($validator->fails()) {
            return redirect('/scholarship' . '#scholarship_form')->withErrors($validator)->withInput();
        } else {
            if ($request->hasFile('id_proof') && $request->hasFile('marksheet')) {
                $dirpath1 = 'images/scholarship/id_proof/';
                $dirpath2 = 'images/scholarship/marksheet/';
                if (!file_exists($dirpath1)) {
                    mkdir($dirpath1, 0777, true);
                }
                if (!file_exists($dirpath2)) {
                    mkdir($dirpath2, 0777, true);
                }
                $originName1 = $request->file('id_proof')->getClientOriginalName();
                $fileName1 = pathinfo($originName1, PATHINFO_FILENAME);
                $extension1 = $request->file('id_proof')->getClientOriginalExtension();
                $fileName1 = $fileName1 . '_' . time() . '.' . $extension1;
                $request->file('id_proof')->move(public_path($dirpath1), $fileName1);
                $url1 = asset($dirpath1 . $fileName1);

                $originName2 = $request->file('marksheet')->getClientOriginalName();
                $fileName2 = pathinfo($originName2, PATHINFO_FILENAME);
                $extension2 = $request->file('marksheet')->getClientOriginalExtension();
                $fileName2 = $fileName2 . '_' . time() . '.' . $extension2;
                $request->file('marksheet')->move(public_path($dirpath2), $fileName2);
                $url2 = asset($dirpath2 . $fileName2);

                // Calling razorpay api here
                $api = new Api($this->razorpayId, $this->razorpayKey);

                // Generating Receipt Id
                $receiptId = Str::random(20);

                // Creating orders
                // convert rupees into paise so multiply by 100
                // currency in INR
                $order = $api->order->create(array(
                    'receipt' => $receiptId,
                    'amount' => (99 * 100),
                    'payment_capture' => 1,
                    'currency' => 'INR'
                ));

                $response = [
                    'orderId' => $order['id'],
                    'razorpayId' => $this->razorpayId,
                    'amount' => 99,
                    'currency' => 'INR',
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'courseType' => $request->course_type,
                    'comboType' => $request->combo_type,
                    'course' => $request->course,
                    'marks' => $request->marks,
                    'maxMarks' => $request->max_marks,
                    'percentage' => $request->percentage,
                    'registrationNo' => $request->registration_no,
                    'rollNo' => $request->roll_no,
                    'date' => $request->date,
                    'idProof' => $url1,
                    'marksheet' => $url2
                ];

                return view('payment.scholarship-payment-page', compact('response'));
            }
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
