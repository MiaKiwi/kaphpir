<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnsupportedMediaType extends HttpError
{
    public function __construct(string $message = 'Unsupported Media Type', array $previous = [])
    {
        parent::__construct(415, 'UNSUPPORTED_MEDIA_TYPE', $message, $previous);
    }
}
