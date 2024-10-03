<?php

namespace Modules\Pages\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Modules\Pages\app\Contracts\BeforePageRenderMiddleware as BeforePageRenderMiddlewareInterface;

class BeforePageRenderMiddleware implements BeforePageRenderMiddlewareInterface {
    /**
     * {@inheritdoc}
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
