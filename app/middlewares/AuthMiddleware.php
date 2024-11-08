<?php

class AuthMiddleware
{
    protected $redirectTo = '/login';

    public function handle($request, $next)
    {
        if (!isset($_SESSION['userAltName'])) {
            header("Location: {$this->redirectTo}");
            exit();
        }

        return $next($request);
    }
}
