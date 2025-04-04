<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class UpgradeRequired extends HttpError
{
    public function __construct(string $message = 'Upgrade Required', array $previous = [])
    {
        parent::__construct(426, 'UPGRADE_REQUIRED', $message, $previous);
    }
}
