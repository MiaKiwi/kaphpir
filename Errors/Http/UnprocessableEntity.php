<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnprocessableEntity extends HttpError
{
    public function __construct(string $message = 'Unprocessable Entity', array $previous = [])
    {
        parent::__construct(422, 'UNPROCESSABLE_ENTITY', $message, $previous);
    }
}
