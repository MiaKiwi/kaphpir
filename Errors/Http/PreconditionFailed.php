<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class PreconditionFailed extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Precondition Failed')
    {
        parent::__construct(412, $message, $previous);
    }
}
