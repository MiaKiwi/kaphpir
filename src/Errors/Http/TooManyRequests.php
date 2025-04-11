<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class TooManyRequests extends HttpError
{
    public function __construct(string $message = 'Too Many Requests', array $previous = [])
    {
        parent::__construct(429, 'TOO_MANY_REQUESTS', $message, $previous);
    }
}
