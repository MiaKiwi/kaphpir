<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class EnhanceYourCalm extends HttpError
{
    public function __construct(string $message = 'Enhance Your Calm', array $previous = [])
    {
        parent::__construct(420, 'ENHANCE_YOUR_CALM', $message, $previous);
    }
}
