<?php

namespace MiaKiwi\Kaphpir\ApiResponse;

use MiaKiwi\Kaphpir\Responses\IResponse;
use MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer;
use MiaKiwi\Kaphpir\Settings\Settings;

interface IApiResponse
{
    /**
     * Writes the response to the output stream.
     * @param \MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer $serializer
     * @param \MiaKiwi\Kaphpir\Responses\IResponse $response
     * @param \MiaKiwi\Kaphpir\Settings\Settings|null $settings
     * @return void
     */
    public static function send(IResponseSerializer $serializer, IResponse $response, ?Settings $settings = null): void;
}