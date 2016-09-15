<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "feature/delete",
        "agents/delete",
        "feature/get",
        "agents/get",
        "category/get",
        "category/delete",
        "property/fileupload",
        "property/addTofeatured",
        "property/addToArchive",
        "send_request"
    ];
}
