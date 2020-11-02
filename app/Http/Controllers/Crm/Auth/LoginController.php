<?php

namespace App\Http\Controllers\Crm\Auth;

use App\Http\Controllers\Crm\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !$user->isActive()) {
            return false;
        }

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function showLoginForm()
    {
        return view('crm.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

}
