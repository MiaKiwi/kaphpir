<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotFound extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Not Found')
    {
        parent::__construct(404, $message, $previous);
    }
}
