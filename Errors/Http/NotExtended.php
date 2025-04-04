<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotExtended extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Not Extended')
    {
        parent::__construct(510, $message, $previous);
    }
}
