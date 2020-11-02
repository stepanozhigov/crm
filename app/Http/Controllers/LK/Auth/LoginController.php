<?php

namespace App\Http\Controllers\LK\Auth;

use App\Helpers\DomainHelper;
use App\Http\Controllers\LK\Controller;
use App\Models\Client;
use App\Models\SuperClient;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('guest:client')->except('logout');
    }

    public function authenticated()
    {
        return redirect()->route($this->subdomain.'home');
    }

    public function showLoginForm()
    {
        return view('lk.auth.login', ['subdomain' => $this->subdomain]);
    }

    protected function guard()
    {
        return auth('client');
    }

    protected function guardSuper(): StatefulGuard
    {
        return auth('superClient');
    }

    protected function attemptLogin(Request $request)
    {
        $guard     = $this->guard();
        $subdomain = DomainHelper::getOriginalSubdomain($this->subdomain);

        /** @var Client */
        $client = Client::where('email', $request->email)->first();
        if (null === $client) {
            return false;
        }
        
        if (SuperClient::ID === $client->id) {
            $guard  = $this->guardSuper();
            $client = SuperClient::instance();
        }
        
        if (!$client->isActive() || !$client->projectMatch($subdomain)) {
            return false;
        }

        return $guard->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function loggedOut()
    {
        return redirect()
            ->route($this->subdomain.'login')
            ->with('success','Client has been logged out!');
    }

}
