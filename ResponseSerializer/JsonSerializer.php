<?php

namespace MiaKiwi\Kaphpir\ResponseSerializer;

use MiaKiwi\Kaphpir\Responses\IResponse;
use MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer;

class JsonSerializer implements IResponseSerializer
{
    private static ?self $instance = null;

    protected static string $mimeType = 'application/json';



    private function __construct()
    {
        // Constructor is private to prevent instantiation from outside the class.
    }



    /**
     * Returns the serializer object instance.
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }



    /**
     * Returns the MIME type of the serialization format.
     * @return string
     */
    public static function getMimeType(): string
    {
        return self::$mimeType;
    }



    /**
     * Serializes the response object to a string.
     * @param \MiaKiwi\Kaphpir\Responses\IResponse $response
     * @return void
     */
    public static function serialize(IResponse $response): string
    {
        return json_encode($response->getKapirValue(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}