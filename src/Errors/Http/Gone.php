<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Gone extends HttpError
{
    public function __construct(string $message = 'Gone', array $previous = [])
    {
        parent::__construct(410, 'GONE', $message, $previous);
    }
}
