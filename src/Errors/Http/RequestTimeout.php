<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestTimeout extends HttpError
{
    public function __construct(string $message = 'Request Timeout', array $previous = [])
    {
        parent::__construct(408, 'REQUEST_TIMEOUT', $message, $previous);
    }
}
