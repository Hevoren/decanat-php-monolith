<?php

namespace Middlewares;

use Exception;
use Src\Auth\Auth;
use Src\Request;

class CanMiddleware
{
    /**
     * @throws Exception
     */
    public function handle(Request $request, int $requiredRole): void
    {
        if (!Auth::userHasRole($requiredRole)) {
            app()->route->redirect('/main');
            throw new Exception('Forbidden for you');
        }
    }
}