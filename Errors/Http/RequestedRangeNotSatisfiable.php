<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestedRangeNotSatisfiable extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Requested Range Not Satisfiable')
    {
        parent::__construct(416, $message, $previous);
    }
}
