<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ApiExceptionHandler extends Exception
{
    public function render($request, Throwable $exception)
    {
        // Return JSON for model not found in API routes
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'message' => __('error.not_found', ['attribute' => 'data']),
                ], 404);
            }
        }

        return parent::render($request, $exception);
    }
}
