<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnavailableForLegalReasons extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Unavailable For Legal Reasons')
    {
        parent::__construct(451, $message, $previous);
    }
}
