<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Forbidden extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Forbidden')
    {
        parent::__construct(403, $message, $previous);
    }
}
