<?php

namespace App\Http\Middleware;

use App\Helpers\DomainHelper;
use App\Models\Project;
use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //under client middleware request has project
        if($request->project) {
            $locale = $request->project->language;
            app()->setLocale($locale);
        }
        // if ?locale=
        elseif($request->query('locale')) {
            $locale = $request->query('locale');
            app()->setLocale($locale);
        } else {
            $sub_domain = DomainHelper::getSubdomain($request);
            $project = Project::where('domain',$sub_domain)->first();
            if($project) app()->setLocale($project->language);
        }
        return $next($request);
    }
}
