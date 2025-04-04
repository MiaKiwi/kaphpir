<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class EnhanceYourCalm extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Enhance Your Calm')
    {
        parent::__construct(420, $message, $previous);
    }
}
