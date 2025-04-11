<?php

namespace MiaKiwi\Kaphpir\ApiResponse;

use MiaKiwi\Kaphpir\ApiResponse\IApiResponse;
use MiaKiwi\Kaphpir\Errors\Http\HttpError;
use MiaKiwi\Kaphpir\Responses\IResponse;
use MiaKiwi\Kaphpir\Responses\ResponseStatus;
use MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer;
use MiaKiwi\Kaphpir\Settings\Settings;
use MiaKiwi\Kaphpir\Settings\DefaultSettings;

class HttpApiResponse implements IApiResponse
{
    public static function send(IResponseSerializer $serializer, IResponse $response, ?Settings $settings = null, int $httpStatus = 200, array $headers = []): void
    {
        // If no settings are provided, use the default settings
        if ($settings === null) {
            $settings = DefaultSettings::getInstance();
        }

        // Check if the response is valid
        if (!$response->isValid()) {
            throw new \InvalidArgumentException('Invalid response object provided.');
        }

        // If the response has a status of "error" and the error is an HTTP error, use the HTTP status code from the error
        if ($response->getStatus() === ResponseStatus::Error && $response->getError() instanceof HttpError) {
            $httpStatus = $response->getError()->getHttpStatusCode();
        }

        // Check if the HTTP status code is valid
        if ($httpStatus < 100 || $httpStatus > 599) {
            throw new \InvalidArgumentException('Invalid HTTP status code: ' . $httpStatus);
        }

        // Add the Content-Type header
        $headers['Content-Type'] = $serializer::getMimeType();

        // Add the KAPIR version header if enabled in settings (the settings of the response apply)
        if ($settings->getSetting('http.headers.kapir-version.enabled', true)) {
            $headers['Kapir-Version'] = $response::getVersion();
        }

        // Set the headers
        foreach ($headers as $key => $value) {
            header("$key: $value");
        }

        // Set the HTTP status code
        http_response_code($httpStatus);

        // Send the serialized response
        echo $serializer::serialize($response);
    }
}