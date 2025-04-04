<?php

namespace MiaKiwi\Kaphpir\ResponseSerializer;

use MiaKiwi\Kaphpir\Responses\IResponse;

interface IResponseSerializer
{
    /**
     * Returns the serializer object instance.
     * @return self
     */
    public static function getInstance(): self;



    /**
     * Returns the MIME type of the serialization format.
     * @return string
     */
    public static function getMimeType(): string;



    /**
     * Serializes the response object to a string.
     * @param \MiaKiwi\Kaphpir\Responses\IResponse $response
     * @return void
     */
    public static function serialize(IResponse $response): string;
}