<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class LoopDetected extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Loop Detected')
    {
        parent::__construct(508, $message, $previous);
    }
}
