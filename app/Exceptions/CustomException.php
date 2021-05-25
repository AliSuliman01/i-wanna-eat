<?php

namespace App\Exceptions;

use App\Helpers\Helpers;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class CustomException extends Exception
{
    protected $detailed_error;

    public function __construct($message = [], $detailed_error = [], $code = 0, Throwable $previous = null)
    {
        parent::__construct(json_encode($message), $code, $previous);

        $this->detailed_error = $detailed_error;
    }

    public function render(Request $request): array
    {
        return Helpers::createErrorResponse(json_decode($this->message,true), $this->detailed_error, $this->code);
    }
}
