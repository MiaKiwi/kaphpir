<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class MethodFailure extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Method Failure')
    {
        parent::__construct(424, $message, $previous);
    }
}
