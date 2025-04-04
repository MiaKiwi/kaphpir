<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class NoResponse extends HttpError
{
    public function __construct(array $previous = [], string $message = 'No Response')
    {
        parent::__construct(444, $message, $previous);
    }
}
