<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class VariantAlsoNegotiates extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Variant Also Negotiates')
    {
        parent::__construct(506, $message, $previous);
    }
}
