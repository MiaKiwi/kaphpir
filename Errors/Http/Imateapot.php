<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Imateapot extends HttpError
{
    public function __construct(array $previous = [], string $message = 'I\'m a teapot')
    {
        parent::__construct(418, $message, $previous);
    }
}
