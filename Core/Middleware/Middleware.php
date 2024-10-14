<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
   public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $Middleware = static::MAP[$key] ?? false;

        if (!$Middleware) {
            throw new Exception("No Matching Middleware found for key '{$key}'.");
        }

        (new $Middleware)->handle();
    }
}