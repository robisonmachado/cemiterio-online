<?php

namespace App\Exceptions;

use Exception;

class DeleteCertidaoObitoException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //parent::report($exception);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return back()->with('exception', $this->getMessage());
        //return response()->view('errors.database-error', ['message' => $this->getMessage()], 500);
    }
}