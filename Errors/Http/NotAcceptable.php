<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NotAcceptable extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Not Acceptable')
    {
        parent::__construct(406, $message, $previous);
    }
}
