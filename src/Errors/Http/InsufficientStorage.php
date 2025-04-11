<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class InsufficientStorage extends HttpError
{
    public function __construct(string $message = 'Insufficient Storage', array $previous = [])
    {
        parent::__construct(507, 'INSUFFICIENT_STORAGE', $message, $previous);
    }
}
