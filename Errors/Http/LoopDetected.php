<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class LoopDetected extends HttpError
{
    public function __construct(string $message = 'Loop Detected', array $previous = [])
    {
        parent::__construct(508, 'LOOP_DETECTED', $message, $previous);
    }
}
