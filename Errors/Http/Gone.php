<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Gone extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Gone')
    {
        parent::__construct(410, $message, $previous);
    }
}
