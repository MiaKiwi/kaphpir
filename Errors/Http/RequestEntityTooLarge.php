<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestEntityTooLarge extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Request Entity Too Large')
    {
        parent::__construct(413, $message, $previous);
    }
}
