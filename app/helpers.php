<?php

use Illuminate\Support\Str;

if (! function_exists('str')) {
    function str($value = '')
    {
        return Str::of($value);
    }
}

if (! function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}

if (! function_exists('lang_path')) {
    function lang_path(string $path = ''): string
    {
        return resource_path('lang' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}
