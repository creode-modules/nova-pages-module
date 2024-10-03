<?php

namespace Modules\Pages\app\Contracts;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface BeforePageRenderMiddleware
{
    /**
     * Native handle method for middleware.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response;
}
