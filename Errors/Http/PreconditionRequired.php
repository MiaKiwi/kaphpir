<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class PreconditionRequired extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Precondition Required')
    {
        parent::__construct(428, $message, $previous);
    }
}
