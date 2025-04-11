<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class PaymentRequired extends HttpError
{
    public function __construct(string $message = 'Payment Required', array $previous = [])
    {
        parent::__construct(402, 'PAYMENT_REQUIRED', $message, $previous);
    }
}
