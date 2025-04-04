<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ExpectationFailed extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Expectation Failed')
    {
        parent::__construct(417, $message, $previous);
    }
}
