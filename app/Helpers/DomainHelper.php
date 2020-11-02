<?php


namespace App\Helpers;

use Illuminate\Http\Request;
use Str;

class DomainHelper
{
    /**
     * Remove dev prefix if exists from subdomain to get original
     *
     * @param string $subdomain
     *
     * @return string
     */
    public static function getOriginalSubdomain($subdomain): string
    {
        $devPrefix = config('domain.dev_prefix');
        if (Str::startsWith($subdomain, $devPrefix)) {
            $subdomain = Str::replaceFirst($devPrefix, '', $subdomain);
        }

        return $subdomain;
    }

    /**
     * Get subdomain from request
     *
     * @param Request $request
     *
     * @return string
     */
    public static function getSubdomain(Request $request)
    {
        $host = $request->server->get('HTTP_HOST');
        return substr($host, 0, strpos($host, '.')+1);
    }
}
