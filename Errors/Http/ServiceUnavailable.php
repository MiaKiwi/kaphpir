<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ServiceUnavailable extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Service Unavailable')
    {
        parent::__construct(503, $message, $previous);
    }
}
