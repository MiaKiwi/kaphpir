<?php

namespace MiaKiwi\Kaphpir\Responses;

enum ResponseStatus: int
{
    case Error = 0;
    case Success = 1;

    /**
     * Returns the string representation of the response status.
     * @return string
     */
    public function getKapirString(): string
    {
        return match ($this) {
            self::Error => 'error',
            self::Success => 'success',
        };
    }
}