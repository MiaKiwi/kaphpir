<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ProxyAuthenticationRequired extends HttpError
{
    public function __construct(string $message = 'Proxy Authentication Required', array $previous = [])
    {
        parent::__construct(407, 'PROXY_AUTHENTICATION_REQUIRED', $message, $previous);
    }
}
