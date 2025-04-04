<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BadGateway extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Bad Gateway')
    {
        parent::__construct(502, $message, $previous);
    }
}
