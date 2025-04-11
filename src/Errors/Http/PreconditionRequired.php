<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class PreconditionRequired extends HttpError
{
    public function __construct(string $message = 'Precondition Required', array $previous = [])
    {
        parent::__construct(428, 'PRECONDITION_REQUIRED', $message, $previous);
    }
}
