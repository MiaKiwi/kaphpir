<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class Networkconnecttimeouterror extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Network connect timeout error')
    {
        parent::__construct(599, $message, $previous);
    }
}
