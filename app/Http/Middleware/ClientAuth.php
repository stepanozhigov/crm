<?php

namespace App\Http\Middleware;

use App\Helpers\DomainHelper;
use App\Models\Project;
use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClientAuth extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);
        $subdomain = $this->getSubdomain($request);
        $originalDomain = DomainHelper::getOriginalSubdomain($subdomain);
        $project = Project::current($originalDomain);
        $client = Auth::user();
        View::share('subdomain', $subdomain);
        View::share('client', $client);
        View::share('project', $project);
        $request->project = $project;
        $request->client = $client;

        return $next($request);
    }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route($this->getSubdomain($request).'login');
        }
    }

    private function getSubdomain(Request $request)
    {
        $host = $request->server->get('HTTP_HOST');
        return substr($host, 0, strpos($host, '.')+1);
    }

}
