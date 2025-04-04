<?php

namespace MiaKiwi\Kaphpir\ApiResponse;

use MiaKiwi\Kaphpir\ApiResponse\IApiResponse;
use MiaKiwi\Kaphpir\Responses\IResponse;
use MiaKiwi\Kaphpir\Responses\ResponseStatus;
use MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer;

class HttpApiResponse implements IApiResponse
{
    public static function send(IResponseSerializer $serializer, IResponse $response, int $httpStatus = 200, array $headers = []): void
    {
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

        $headers = array_merge($headers, [
            'Content-Type' => $serializer::getMimeType(),
            'Kapir-Version' => $response::getVersion(),
        ]);

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