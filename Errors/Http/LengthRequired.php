<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class LengthRequired extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Length Required')
    {
        parent::__construct(411, $message, $previous);
    }
}
