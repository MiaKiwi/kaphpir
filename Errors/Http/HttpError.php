<?php

namespace MiaKiwi\Kaphpir\Errors\Http;

use MiaKiwi\Kaphpir\Errors\Error;

abstract class HttpError extends Error
{
    private int $httpCode;

    public function __construct(int $code, string $message, array $previous = [])
    {
        parent::__construct($code, $message, $previous);
        $this->httpCode = $code;
    }

    /**
     * Sets the HTTP status code for the error.
     * @return int
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpCode;
    }
}