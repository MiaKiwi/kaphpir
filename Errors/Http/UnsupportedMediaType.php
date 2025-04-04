<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnsupportedMediaType extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Unsupported Media Type')
    {
        parent::__construct(415, $message, $previous);
    }
}
