<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class PaymentRequired extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Payment Required')
    {
        parent::__construct(402, $message, $previous);
    }
}
