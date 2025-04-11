<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class FailedDependency extends HttpError
{
    public function __construct(string $message = 'Failed Dependency', array $previous = [])
    {
        parent::__construct(424, 'FAILED_DEPENDENCY', $message, $previous);
    }
}
