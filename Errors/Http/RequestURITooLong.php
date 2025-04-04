<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestURITooLong extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Request-URI Too Long')
    {
        parent::__construct(414, $message, $previous);
    }
}
