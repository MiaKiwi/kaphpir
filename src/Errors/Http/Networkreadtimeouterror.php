<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NetworkReadTimeoutError extends HttpError
{
    public function __construct(string $message = 'Network read timeout error', array $previous = [])
    {
        parent::__construct(598, 'NETWORK_READ_TIMEOUT_ERROR', $message, $previous);
    }
}
