<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class InsufficientStorage extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Insufficient Storage')
    {
        parent::__construct(507, $message, $previous);
    }
}
