<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnorderedCollection extends HttpError
{
    public function __construct(string $message = 'Unordered Collection', array $previous = [])
    {
        parent::__construct(425, 'UNORDERED_COLLECTION', $message, $previous);
    }
}
