<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class CheckoutLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.student.cart-login');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role != 'student') {
                Auth::logout();
                return redirect()->back()->with('error', 'Please login as a student.');
            }

            // $request->session()->flush();
            $cart = $request->session()->get('cart');
            $user_id = Auth::id();
            $request->session()->forget('cart');
            $request->session()->regenerate();

            if ($cart) {
                $cartArray = array_map(function ($v) use ($user_id) {
                    return (Arr::add($v, 'user_id', $user_id));
                }, $cart);
            } else {
                $oldCart = Cart::where('user_id', Auth::id())->whereNull('deleted_at')->get();
                if(!empty($oldCart) ) {
                    return redirect('/cart');
                } else {
                    return redirect('/cart')->with('error', 'Cart empty.');
                }
                // return redirect('/cart')->with('error', 'Cart empty.');
            }
            $insertCart = Cart::insert($cartArray);
            return redirect('/cart')->with('success', 'Added to Cart successfully.');
        }
        return $this->sendFailedLoginResponse($request);
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
        //
    }

    public function destroy($id)
    {
        //
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email:rfc,dns',
            'password' => 'required|string',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
