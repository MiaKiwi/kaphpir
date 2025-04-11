<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class MethodFailure extends HttpError
{
    public function __construct(string $message = 'Method Failure', array $previous = [])
    {
        parent::__construct(424, 'METHOD_FAILURE', $message, $previous);
    }
}
