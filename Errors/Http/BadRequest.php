<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BadRequest extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Bad Request')
    {
        parent::__construct(400, $message, $previous);
    }
}
