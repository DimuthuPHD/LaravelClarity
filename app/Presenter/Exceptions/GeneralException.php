<?php

namespace App\Presenter\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class GeneralException extends Exception
{
    /**
     * @var
     */
    public $message;

    /**
     * GeneralException constructor.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report the exception.
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render(Request $request, $redirect = false)
    {

        if (request()->expectsJson()) {
            return response(
                [
                    'success' => false,
                    'error' => [
                        'message' => $this->message
                    ]
                ]
            );
        }


        return redirect()
            ->back()
            ->withInput()
            ->withFlashDanger($this->message);
    }
}
