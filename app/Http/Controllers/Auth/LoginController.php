<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 'super-admin':
                $this->redirectTo = '/admin-login/orders';
                return $this->redirectTo;
                break;
            case 'counsellor':
                $this->redirectTo = '/counsellor/order';
                return $this->redirectTo;
                break;
            case 'order-fulfilment-team':
                    $this->redirectTo = '/fulfilment/order';
                    return $this->redirectTo;
                    break;
            case 'teacher':
                $this->redirectTo = '/teacher/profile';
                return $this->redirectTo;
                break;
            case 'student':
                $this->redirectTo = '/student/profile';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/';
                return $this->redirectTo;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$field => $login]);
        return $field;
    }
}
