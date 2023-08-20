<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class CustomException extends Exception
{
    public function render($request, Throwable $exception)
{
    if ($exception instanceof CustomException) {
        return response()->view('errors.custom', [], 500);
    }

    return parent::render($request, $exception);
}
}
