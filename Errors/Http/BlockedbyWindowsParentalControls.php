<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BlockedbyWindowsParentalControls extends HttpError
{
    public function __construct(array $previous = [], string $message = 'Blocked by Windows Parental Controls')
    {
        parent::__construct(450, $message, $previous);
    }
}
