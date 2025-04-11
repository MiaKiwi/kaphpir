<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ServiceUnavailable extends HttpError
{
    public function __construct(string $message = 'Service Unavailable', array $previous = [])
    {
        parent::__construct(503, 'SERVICE_UNAVAILABLE', $message, $previous);
    }
}
