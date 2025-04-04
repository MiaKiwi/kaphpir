<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ProxyAuthenticationRequired extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Proxy Authentication Required')
    {
        parent::__construct(407, $message, $previous);
    }
}
