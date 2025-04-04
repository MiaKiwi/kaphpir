<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class GatewayTimeout extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Gateway Timeout')
    {
        parent::__construct(504, $message, $previous);
    }
}
