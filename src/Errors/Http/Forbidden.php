<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Forbidden extends HttpError
{
    public function __construct(string $message = 'Forbidden', array $previous = [])
    {
        parent::__construct(403, 'FORBIDDEN', $message, $previous);
    }
}
