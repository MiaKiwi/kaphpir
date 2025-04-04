<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class InternalServerError extends HttpError
{
    public function __construct(string $message = 'Internal Server Error', array $previous = [])
    {
        parent::__construct(500, 'INTERNAL_SERVER_ERROR', $message, $previous);
    }
}
