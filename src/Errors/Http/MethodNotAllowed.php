<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class MethodNotAllowed extends HttpError
{
    public function __construct(string $message = 'Method Not Allowed', array $previous = [])
    {
        parent::__construct(405, 'METHOD_NOT_ALLOWED', $message, $previous);
    }
}
