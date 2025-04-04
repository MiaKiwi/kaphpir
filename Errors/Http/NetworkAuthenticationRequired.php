<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NetworkAuthenticationRequired extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Network Authentication Required')
    {
        parent::__construct(511, $message, $previous);
    }
}
