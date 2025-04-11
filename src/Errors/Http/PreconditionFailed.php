<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class PreconditionFailed extends HttpError
{
    public function __construct(string $message = 'Precondition Failed', array $previous = [])
    {
        parent::__construct(412, 'PRECONDITION_FAILED', $message, $previous);
    }
}
