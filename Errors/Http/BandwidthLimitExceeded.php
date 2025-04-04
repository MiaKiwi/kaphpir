<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BandwidthLimitExceeded extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Bandwidth Limit Exceeded')
    {
        parent::__construct(509, $message, $previous);
    }
}
