<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnorderedCollection extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Unordered Collection')
    {
        parent::__construct(425, $message, $previous);
    }
}
