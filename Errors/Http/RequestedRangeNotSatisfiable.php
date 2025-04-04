<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class RequestedRangeNotSatisfiable extends HttpError
{
    public function __construct(string $message = 'Requested Range Not Satisfiable', array $previous = [])
    {
        parent::__construct(416, 'REQUESTED_RANGE_NOT_SATISFIABLE', $message, $previous);
    }
}
