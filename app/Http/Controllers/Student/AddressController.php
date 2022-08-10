<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\MstRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $shipAddress = Address::where('user_id', Auth::id())->where('type', 'shipping')->whereNull('deleted_at')->first();
        $billAddress = Address::where('user_id', Auth::id())->where('type', 'billing')->whereNull('deleted_at')->first();
        $state = MstRegion::where('parent_id', '!=', 0)->whereNull('deleted_at')->get();
        $country = MstRegion::where('parent_id', 0)->whereNull('deleted_at')->get();
        return view('admin.student.address-settings', compact('shipAddress', 'billAddress', 'state', 'country'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if(!$request->different_ship_address) {
            $request->validate([
                'bill_address' => 'required',
                'bill_city' => 'required',
                'bill_state' => 'required',
                'bill_country' => 'required',
                'bill_pincode' => 'required|digits:6|regex:/^((?!(0))[0-9]{6})$/'
            ], [
                'bill_address.required' => 'Address is required.',
                'bill_city.required' => 'City is required.',
                'bill_state.required' => 'State is required.',
                'bill_country.required' => 'Country is required.',
                'bill_pincode.required' => 'Pincode is required.',
                'bill_pincode.digits' => 'Pincode must be :digits digits.',
                'bill_pincode.regex' => 'Pincode format is invalid.'
            ]);
        } else {
            $request->validate([
                'bill_address' => 'required',
                'bill_city' => 'required',
                'bill_state' => 'required',
                'bill_country' => 'required',
                'bill_pincode' => 'required|digits:6|regex:/^((?!(0))[0-9]{6})$/',
                'ship_address' => 'required',
                'ship_city' => 'required',
                'ship_state' => 'required',
                'ship_country' => 'required',
                'ship_pincode' => 'required|digits:6|regex:/^((?!(0))[0-9]{6})$/'
            ], [
                'bill_address.required' => 'Address is required.',
                'bill_city.required' => 'City is required.',
                'bill_state.required' => 'State is required.',
                'bill_country.required' => 'Country is required.',
                'bill_pincode.required' => 'Pincode is required.',
                'bill_pincode.digits' => 'Pincode must be :digits digits.',
                'bill_pincode.regex' => 'Pincode format is invalid.',
                'ship_address.required' => 'Address is required.',
                'ship_city.required' => 'City is required.',
                'ship_state.required' => 'State is required.',
                'ship_country.required' => 'Country is required.',
                'ship_pincode.required' => 'Pincode is required.',
                'ship_pincode.digits' => 'Pincode must be :digits digits.',
                'ship_pincode.regex' => 'Pincode format is invalid.'

            ]);
        }

        $updateBillAddress = Address::updateOrCreate(
            ['user_id' => $id, 'type' => 'billing'],
            [
                'address' => $request->bill_address,
                'city' => $request->bill_city,
                'state_id' => $request->bill_state,
                'country_id' => $request->bill_country,
                'pin_code' => $request->bill_pincode,
                'landmark' => $request->bill_landmark,
                'different_ship_address' => 0
            ]
        );

        if (!$request->different_ship_address) {
            $shipAddress = [
                'address' => $request->bill_address,
                'city' => $request->bill_city,
                'state_id' => $request->bill_state,
                'country_id' => $request->bill_country,
                'pin_code' => $request->bill_pincode,
                'landmark' => $request->bill_landmark,
                'different_ship_address' => $request->different_ship_address ? 1 : 0
            ];
        } else {
            $shipAddress = [
                'address' => $request->ship_address,
                'city' => $request->ship_city,
                'state_id' => $request->ship_state,
                'country_id' => $request->ship_country,
                'pin_code' => $request->ship_pincode,
                'landmark' => $request->ship_landmark,
                'different_ship_address' => $request->different_ship_address ? 1 : 0
            ];
        }

        $updateShipAddress = Address::updateOrCreate(
            ['user_id' => $id, 'type' => 'shipping'],
            $shipAddress
        );

        // return redirect('student/address')->with('success', 'Success !');
        return redirect()->back()->with('success', 'Success !');
        // return back()->with('success', 'Success !');
    }

    public function destroy($id)
    {
        //
    }
}
