<?php

namespace MiaKiwi\Kaphpir\ApiResponse;

use MiaKiwi\Kaphpir\Responses\IResponse;
use MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer;

interface IApiResponse
{
    /**
     * Writes the response to the output stream.
     * @param \MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer $serializer
     * @param \MiaKiwi\Kaphpir\Responses\IResponse $response
     * @return void
     */
    public static function send(IResponseSerializer $serializer, IResponse $response): void;
}