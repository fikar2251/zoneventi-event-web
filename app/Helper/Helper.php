<?php

if (!function_exists('setActiveClass')) {
    function setActiveClass($routeNames, $activeClass = 'active')
    {
        return request()->routeIs($routeNames) ? $activeClass : '';
    }
}