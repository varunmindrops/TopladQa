<?php

namespace App\Http\Controllers;

use App\Models\MstRegion;
use App\Models\User;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use Illuminate\support\Str;

class CheckoutController extends Controller
{
    private $razorpayId;
    private $razorpayKey;

    public function __construct()
    {
        $this->razorpayId = config('razorpay.razorpayId');
        $this->razorpayKey = config('razorpay.razorpayKey');
    }

    public function index()
    {
        $cart = DB::select('SELECT ct.id, pp.proposed_market_price
                                FROM cart as ct
                                INNER JOIN product as pr ON ct.product_id = pr.id
                                INNER JOIN product_price as pp ON pp.product_id = pr.id
                                INNER JOIN product_language as pl ON pl.product_id = pr.id
                                WHERE ct.user_id=(' . Auth()->id() . ') AND pp.book_delivery_type_id = ct.book_delivery_id AND pp.video_delivery_type_id = ct.video_delivery_id AND pp.attempt_id = ct.attempt_id AND pl.product_type_id = 2 AND pl.language_id = ct.language_id');

        $user = User::with(['billAddress', 'billAddress.state', 'billAddress.country', 'shipAddress', 'shipAddress.state', 'shipAddress.country'])->find(Auth::id());

        $country = MstRegion::where('parent_id', 0)->whereNull('deleted_at')->get();
        $state = MstRegion::where('parent_id', '!=', 0)->whereNull('deleted_at')->get();

        return view('site.checkout', compact('cart', 'user', 'country', 'state'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
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
        if (!$request->different_ship_address) {
            $request->validate([
                'bill_address' => 'required',
                'bill_city' => 'required',
                'bill_state' => 'required',
                'bill_country' => 'required',
                'bill_pincode' => 'required|digits:6|regex:/^((?!(0))[0-9]{6})$/',
                'price_total' => 'required'

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
                'ship_pincode' => 'required|digits:6|regex:/^((?!(0))[0-9]{6})$/',
                'price_total' => 'required'
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

        $cart = Cart::where('user_id', Auth::id())->whereNull('deleted_at')->get();

        if ($cart->isEmpty() || $request->price_total < 1) {
            return redirect('checkout')->with('error', 'Invalid Attempt OR Cart Empty!');
        } else {
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

            // Calling razorpay api here
            $api = new Api($this->razorpayId, $this->razorpayKey);

            // Generating Receipt Id
            $receiptId = Str::random(20);

            // Creating orders
            // convert rupees into paise so multiply by 100
            // currency in INR
            $order = $api->order->create(array(
                'receipt' => $receiptId,
                'amount' => ($request->price_total * 100),
                'payment_capture' => 1,
                'currency' => 'INR'
            ));

            $response = [
                'orderId' => $order['id'],
                'razorpayId' => $this->razorpayId,
                'amount' => $request->price_total,
                'name' => $request->name,
                'currency' => 'INR',
                'email' => $request->email,
                'contactNumber' => $request->phone,
                'address' => $request->bill_address,
                'description' => 'Total',
                'userId' => $id,
                'billAddressId' => $updateBillAddress->id,
                'shipAddressId' => $updateShipAddress->id
            ];

            return view('payment.payment-page', compact('response'));
        }
    }

    public function destroy($id)
    {
        //
    }
}
