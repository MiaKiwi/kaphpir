<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestHeaderFieldsTooLarge extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Request Header Fields Too Large')
    {
        parent::__construct(431, $message, $previous);
    }
}
