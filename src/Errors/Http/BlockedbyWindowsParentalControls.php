<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Http\HttpError;

class BlockedByWindowsParentalControls extends HttpError
{
    public function __construct(string $message = 'Blocked by Windows Parental Controls', array $previous = [])
    {
        parent::__construct(450, 'BLOCKED_BY_WINDOWS_PARENTAL_CONTROLS', $message, $previous);
    }
}
