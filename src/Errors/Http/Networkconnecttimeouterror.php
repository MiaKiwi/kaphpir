<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NetworkConnectTimeoutError extends HttpError
{
    public function __construct(string $message = 'Network connect timeout error', array $previous = [])
    {
        parent::__construct(599, 'NETWORK_CONNECT_TIMEOUT_ERROR', $message, $previous);
    }
}
