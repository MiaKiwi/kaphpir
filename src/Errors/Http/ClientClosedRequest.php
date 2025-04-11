<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ClientClosedRequest extends HttpError
{
    public function __construct(string $message = 'Client Closed Request', array $previous = [])
    {
        parent::__construct(499, 'CLIENT_CLOSED_REQUEST', $message, $previous);
    }
}
