<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestEntityTooLarge extends HttpError
{
    public function __construct(string $message = 'Request Entity Too Large', array $previous = [])
    {
        parent::__construct(413, 'REQUEST_ENTITY_TOO_LARGE', $message, $previous);
    }
}
