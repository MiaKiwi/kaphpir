<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class FailedDependency extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Failed Dependency')
    {
        parent::__construct(424, $message, $previous);
    }
}
