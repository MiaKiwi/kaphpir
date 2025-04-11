<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BadGateway extends HttpError
{
    public function __construct(string $message = 'Bad Gateway', array $previous = [])
    {
        parent::__construct(502, 'BAD_GATEWAY', $message, $previous);
    }
}
