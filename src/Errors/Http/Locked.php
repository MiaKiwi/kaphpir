<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Locked extends HttpError
{
    public function __construct(string $message = 'Locked', array $previous = [])
    {
        parent::__construct(423, 'LOCKED', $message, $previous);
    }
}
