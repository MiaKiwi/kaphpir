<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Conflict extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Conflict')
    {
        parent::__construct(409, $message, $previous);
    }
}
