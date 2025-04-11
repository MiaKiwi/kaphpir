<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NoResponse extends HttpError
{
    public function __construct(string $message = 'No Response', array $previous = [])
    {
        parent::__construct(444, 'NO_RESPONSE', $message, $previous);
    }
}
