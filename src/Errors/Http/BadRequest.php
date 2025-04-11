<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BadRequest extends HttpError
{
    public function __construct(string $message = 'Bad Request', array $previous = [])
    {
        parent::__construct(400, 'BAD_REQUEST', $message, $previous);
    }
}
