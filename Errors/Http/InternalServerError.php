<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class InternalServerError extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Internal Server Error')
    {
        parent::__construct(500, $message, $previous);
    }
}
