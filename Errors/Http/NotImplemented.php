<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotImplemented extends HttpError
{
    public function __construct(string $message = 'Not Implemented', array $previous = [])
    {
        parent::__construct(501, 'NOT_IMPLEMENTED', $message, $previous);
    }
}
