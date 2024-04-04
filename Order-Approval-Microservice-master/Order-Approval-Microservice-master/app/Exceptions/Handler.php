<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    
    /**
     * Build a JSON response for when validation fails during a JSON request.
     *
     * @param   $request  The incoming HTTP request.
     * @param  \Illuminate\Validation\ValidationException  $exception  The exception thrown when validation fails.
     * @return \Illuminate\Http\JsonResponse  The JSON response to be sent back.
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        // Create a new JSON response with the given data
        return response()->json([
            'statusCode' => $exception->status,
            'success' => false,
            'message' => $exception->getMessage(),
            'errors' => $exception->errors()
        ], $exception->status);
    }
}
