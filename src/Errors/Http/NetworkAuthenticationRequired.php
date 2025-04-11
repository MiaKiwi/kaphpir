<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NetworkAuthenticationRequired extends HttpError
{
    public function __construct(string $message = 'Network Authentication Required', array $previous = [])
    {
        parent::__construct(511, 'NETWORK_AUTHENTICATION_REQUIRED', $message, $previous);
    }
}
