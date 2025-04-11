<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class LengthRequired extends HttpError
{
    public function __construct(string $message = 'Length Required', array $previous = [])
    {
        parent::__construct(411, 'LENGTH_REQUIRED', $message, $previous);
    }
}
