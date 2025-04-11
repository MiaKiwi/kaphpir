<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BandwidthLimitExceeded extends HttpError
{
    public function __construct(string $message = 'Bandwidth Limit Exceeded', array $previous = [])
    {
        parent::__construct(509, 'BANDWIDTH_LIMIT_EXCEEDED', $message, $previous);
    }
}
