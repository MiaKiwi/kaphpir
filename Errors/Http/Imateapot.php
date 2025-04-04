<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class ImATeapot extends HttpError
{
    public function __construct(string $message = 'I\'m a teapot', array $previous = [])
    {
        parent::__construct(418, 'I_M_A_TEAPOT', $message, $previous);
    }
}
