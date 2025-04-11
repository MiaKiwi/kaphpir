<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ExpectationFailed extends HttpError
{
    public function __construct(string $message = 'Expectation Failed', array $previous = [])
    {
        parent::__construct(417, 'EXPECTATION_FAILED', $message, $previous);
    }
}
