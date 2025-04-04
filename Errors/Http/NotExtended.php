<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotExtended extends HttpError
{
    public function __construct(string $message = 'Not Extended', array $previous = [])
    {
        parent::__construct(510, 'NOT_EXTENDED', $message, $previous);
    }
}
