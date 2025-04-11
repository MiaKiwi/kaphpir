<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RetryWith extends HttpError
{
    public function __construct(string $message = 'Retry With', array $previous = [])
    {
        parent::__construct(449, 'RETRY_WITH', $message, $previous);
    }
}
