<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Unauthorized extends HttpError
{
    public function __construct(string $message = 'Unauthorized', array $previous = [])
    {
        parent::__construct(401, 'UNAUTHORIZED', $message, $previous);
    }
}
