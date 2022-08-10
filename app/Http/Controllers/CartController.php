<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index()
    {
        // $cart = Cart::with(['product.subject', 'product.user', 'videoDeliveryType', 'bookDeliveryType'])->where('user_id', Auth::id())->get();

        $cart = DB::select('SELECT ct.id, ct.product_id, ms.name as product_name ,tu.name as product_user, pp.proposed_market_price, ma.name as attempt, ml.name as lang, mdt1.name as video_delivery_type, mdt2.name as book_delivery_type
                                FROM cart as ct
                                INNER JOIN product as pr ON ct.product_id = pr.id
                                INNER JOIN product_price as pp ON pp.product_id = pr.id
                                INNER JOIN product_language as pl ON pl.product_id = pr.id
                                INNER JOIN mst_subject as ms ON pr.subject_id = ms.id
                                INNER JOIN users as tu ON pr.user_id = tu.id
                                INNER JOIN mst_attempt as ma ON pp.attempt_id = ma.id
                                INNER JOIN mst_language as ml ON pl.language_id = ml.id
                                INNER JOIN mst_delivery_type as mdt1 ON pp.video_delivery_type_id = mdt1.id
                                INNER JOIN mst_delivery_type as mdt2 ON pp.book_delivery_type_id = mdt2.id
                                WHERE ct.user_id = ('.Auth()->id().') AND pp.book_delivery_type_id = ct.book_delivery_id AND pp.video_delivery_type_id = ct.video_delivery_id AND pp.attempt_id = ct.attempt_id AND pl.product_type_id = 2 AND pl.language_id = ct.language_id');

        return view('site.cart', compact('cart'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'video_type_value' => 'required',
            'book_type_value' => 'required',
            'attempt_type_value' => 'required',
            'language_type_value' => 'required'
        ]);

        $cart = [
            'product_id' => $request->product_id,
            'video_delivery_id' => $request->video_type_value,
            'book_delivery_id' => $request->book_type_value,
            'language_id' => $request->language_type_value,
            'attempt_id' => $request->attempt_type_value
        ];

        if (Auth::check() && Auth::user()->role == 'student') {
            $insert_cart = Cart::create(Arr::add($cart, 'user_id', Auth::id()));
        } else {
            $request->session()->push('cart', $cart);
            return redirect('/student/checkout-login')->with('error', 'Please Log in as a student before adding to Cart.');
        }

        return redirect()->route('cart.index')
            ->with('success', 'Added to Cart successfully.');
    }

    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect('cart')->with('success', 'Removed from Cart.');
    }
}
