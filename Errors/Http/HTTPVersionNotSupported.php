<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class HttpVersionNotSupported extends HttpError
{
    public function __construct(string $message = 'HTTP Version Not Supported', array $previous = [])
    {
        parent::__construct(505, 'HTTP_VERSION_NOT_SUPPORTED', $message, $previous);
    }
}
