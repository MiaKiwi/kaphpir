<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class MethodNotAllowed extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Method Not Allowed')
    {
        parent::__construct(405, $message, $previous);
    }
}
