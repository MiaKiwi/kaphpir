<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestTimeout extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Request Timeout')
    {
        parent::__construct(408, $message, $previous);
    }
}
