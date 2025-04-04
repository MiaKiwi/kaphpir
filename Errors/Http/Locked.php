<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Locked extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Locked')
    {
        parent::__construct(423, $message, $previous);
    }
}
