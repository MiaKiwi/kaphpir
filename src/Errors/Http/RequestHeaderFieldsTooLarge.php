<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestHeaderFieldsTooLarge extends HttpError
{
    public function __construct(string $message = 'Request Header Fields Too Large', array $previous = [])
    {
        parent::__construct(431, 'REQUEST_HEADER_FIELDS_TOO_LARGE', $message, $previous);
    }
}
