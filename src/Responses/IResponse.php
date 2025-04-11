<?php

namespace MiaKiwi\Kaphpir\Responses;

use MiaKiwi\Kaphpir\Errors\Error;
use \Exception;
use MiaKiwi\Kaphpir\IKapirType;
use MiaKiwi\Kaphpir\Metadata\Metadata;
use MiaKiwi\Kaphpir\Metadata\MetadataMode;

interface IResponse extends IKapirType
{
    /**
     * Sets the status of the response.
     * @param \MiaKiwi\Kaphpir\Responses\ResponseStatus $status
     * @return void
     */
    public function setStatus(ResponseStatus $status): void;

    /**
     * Sets the status of the response to success.
     * @return void
     */
    public function makeSuccess(): void;

    /**
     * Sets the status of the response to error.
     * @return void
     */
    public function makeError(): void;

    /**
     * Sets the status of the response to success and returns the response object for method chaining.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     * @return self
     */
    public function success(null|Error|Exception $e = null): self;

    /**
     * Sets the status of the response to error, sets the error, and returns the response object for method chaining.
     * @param \MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     * @return void
     */
    public function error(Error|Exception $e): self;

    /**
     * Returns the status of the response.
     * @return \MiaKiwi\Kaphpir\Responses\ResponseStatus
     */
    public function getStatus(): ResponseStatus;



    /**
     * Returns the version of the response format.
     * @return string
     */
    public static function getVersion(): string;



    /**
     * Sets the data of the response by reference.
     * @param mixed $data
     * @return void
     */
    public function setData(mixed $data): void;

    /**
     * Sets the data of the response by reference and returns the response object for method chaining.
     * @param mixed $data
     * @return void
     */
    public function data(mixed $data): self;

    /**
     * Returns the data of the response.
     * @param mixed $data
     */
    public function getData(): mixed;



    /**
     * Sets the message of the response.
     * @param null|string $message
     * @return void
     */
    public function setMessage(?string $message): void;

    /**
     * Sets the message of the response and returns the response object for method chaining.
     * @param null|string $message
     * @return self
     */
    public function message(?string $message): self;

    /**
     * Returns the message of the response.
     * @return null|string
     */
    public function getMessage(): ?string;



    /**
     * Sets the error of the response.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     * @return void
     */
    public function setError(null|Error|Exception $e): void;

    /**
     * Resets the error of the response.
     * @return void
     */
    public function clearError(): void;

    /**
     * Returns the error of the response.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     */
    public function getError(): ?Error;



    /**
     * Sets the metadata of the response.
     * @param null|\MiaKiwi\Kaphpir\Metadata\Metadata|array $metadata
     * @return void
     */
    public function setMetadata(null|Metadata|array $metadata): void;

    /**
     * Adds a metadata key-value pair to the response.
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function addMetadata(string $key, mixed $value): void;

    /**
     * Removes a metadata key-value pair from the response.
     * @param string $key
     * @return void
     */
    public function removeMetadata(string $key): void;

    /**
     * Clears all metadata from the response.
     * @return void
     */
    public function clearMetadata(): void;

    /**
     * Edits the metadata of the response and returns the response object for method chaining.
     * @param null|\MiaKiwi\Kaphpir\Metadata\Metadata|array $metadata
     * @return self
     */
    public function metadata(null|Metadata|array $metadata, MetadataMode $mode = MetadataMode::Merge): self;

    /**
     * Returns the metadata of the response.
     * @return null|\MiaKiwi\Kaphpir\Metadata\Metadata
     */
    public function getMetadata(): ?Metadata;

    /**
     * Returns a specific metadata value by key or a default value if the key does not exist.
     * @param string $key
     * @param mixed $default
     * @return void
     */
    public function getMetadatum(string $key, mixed $default = null): mixed;

    /**
     * Returns the metadata of the response with default and computed values included.
     * @return null|\MiaKiwi\Kaphpir\Metadata\Metadata
     */
    public function getMeta(): ?Metadata;



    /**
     * Checks if the reponse is compliant with KAPIR.
     * @return void
     */
    public function isValid(): bool;
}