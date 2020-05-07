<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *选择不需要CSRF的路由
     * @var array
     */
    protected $except = [
        'login',
        'loginTest',
        'adduser',
        'test'
    ];
}
