<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UnavailableForLegalReasons extends HttpError
{
    public function __construct(string $message = 'Unavailable For Legal Reasons', array $previous = [])
    {
        parent::__construct(451, 'UNAVAILABLE_FOR_LEGAL_REASONS', $message, $previous);
    }
}
