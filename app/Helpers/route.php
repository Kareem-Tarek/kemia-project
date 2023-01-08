<?php

use Illuminate\Support\Facades\URL;

if (!function_exists('prefixActive')) {
    function prefixActive($prefixName)
    {
        $m =     explode(".", request()->route()->getName());
        return    $m[0] == $prefixName ? 'active' : '';
    }
}

if (!function_exists('prefixBlock')) {
    function prefixBlock($prefixName)
    {
        $m =     explode(".", request()->route()->getName());
        return    $m[0] == $prefixName ? 'block' : 'none';
    }
}

if (!function_exists('routeActive')) {
    function routeActive($routeName)
    {
        return    request()->routeIs($routeName) ? 'active' : '';
    }
}


function routeActiveSite()
{
    $full_route = URL::full();
    $full_route_array =   explode('/', $full_route);
    if (in_array('site', $full_route_array)) {
        return 'active';
    }else {
        return '';
    }
    // return request()->routeIs($routeName) ? 'active' : '';
}
