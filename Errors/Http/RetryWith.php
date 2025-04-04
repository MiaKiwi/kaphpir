<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RetryWith extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Retry With')
    {
        parent::__construct(449, $message, $previous);
    }
}
