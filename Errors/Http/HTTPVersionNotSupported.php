<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class HTTPVersionNotSupported extends HttpError
{
    public function __construct(array $previous = [], string $message = 'HTTP Version Not Supported')
    {
        parent::__construct(505, $message, $previous);
    }
}
