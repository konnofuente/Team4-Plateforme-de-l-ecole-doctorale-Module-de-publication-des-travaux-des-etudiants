<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    // public function render($request, Throwable $e)
    // {
    // // Determine if the exception needs custom rendering...

    //     return true;
    // }


    public function register()
    {
        // if($exception instanceof ValidationException){
        //     return response([
        //         'errors' => $exception->errors(),
        //     ], 400);
        // }
        $this->renderable(function(ValidationException $e, $request){
            return response()->view('errors.custom',[],500);
        });
        // $this->reportable(function ( Throwable $e) {
        //     if($e instanceof ValidationException){
        //         return response([
        //             'errors' => $e->errors(),
        //         ], 400);
        //     }
           // return response()->view('errors.invalid-order', [], 500);
            // if($e instanceof ValidationException){
            //     return response([
            //         'error' => $e->errors()
            //     ], 400);
            // }
            //return 'error' -> $e->getMessage();
            // return response([
            //     'error' -> $e->getMessage()
            // ], $e->getCode() ? : 400);
        //});
    }
}
