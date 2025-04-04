<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ClientClosedRequest extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Client Closed Request')
    {
        parent::__construct(499, $message, $previous);
    }
}
