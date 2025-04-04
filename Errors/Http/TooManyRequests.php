<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class TooManyRequests extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Too Many Requests')
    {
        parent::__construct(429, $message, $previous);
    }
}
