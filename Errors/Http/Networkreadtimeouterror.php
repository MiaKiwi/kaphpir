<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Networkreadtimeouterror extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Network read timeout error')
    {
        parent::__construct(598, $message, $previous);
    }
}
