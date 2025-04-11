<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class VariantAlsoNegotiates extends HttpError
{
    public function __construct(string $message = 'Variant Also Negotiates', array $previous = [])
    {
        parent::__construct(506, 'VARIANT_ALSO_NEGOTIATES', $message, $previous);
    }
}
