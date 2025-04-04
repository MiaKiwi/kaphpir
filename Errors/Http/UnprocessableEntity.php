<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnprocessableEntity extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Unprocessable Entity')
    {
        parent::__construct(422, $message, $previous);
    }
}
