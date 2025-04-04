<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequesturiTooLong extends HttpError
{
    public function __construct(string $message = 'Request-URI Too Long', array $previous = [])
    {
        parent::__construct(414, 'REQUEST_URI_TOO_LONG', $message, $previous);
    }
}
