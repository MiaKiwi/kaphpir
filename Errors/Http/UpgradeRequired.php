<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UpgradeRequired extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Upgrade Required')
    {
        parent::__construct(426, $message, $previous);
    }
}
