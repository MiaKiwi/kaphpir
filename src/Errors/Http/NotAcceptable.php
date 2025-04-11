<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotAcceptable extends HttpError
{
    public function __construct(string $message = 'Not Acceptable', array $previous = [])
    {
        parent::__construct(406, 'NOT_ACCEPTABLE', $message, $previous);
    }
}
