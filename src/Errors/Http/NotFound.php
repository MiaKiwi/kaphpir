<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotFound extends HttpError
{
    public function __construct(string $message = 'Not Found', array $previous = [])
    {
        parent::__construct(404, 'NOT_FOUND', $message, $previous);
    }
}
