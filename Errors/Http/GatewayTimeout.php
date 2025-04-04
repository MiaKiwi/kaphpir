<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class GatewayTimeout extends HttpError
{
    public function __construct(string $message = 'Gateway Timeout', array $previous = [])
    {
        parent::__construct(504, 'GATEWAY_TIMEOUT', $message, $previous);
    }
}
