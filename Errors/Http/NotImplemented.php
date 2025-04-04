<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotImplemented extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Not Implemented')
    {
        parent::__construct(501, $message, $previous);
    }
}
