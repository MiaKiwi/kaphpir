<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Conflict extends HttpError
{
    public function __construct(string $message = 'Conflict', array $previous = [])
    {
        parent::__construct(409, 'CONFLICT', $message, $previous);
    }
}
