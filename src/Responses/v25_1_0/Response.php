<?php

namespace MiaKiwi\Kaphpir\Responses\v25_1_0;

use Exception;
use MiaKiwi\Kaphpir\Responses\IResponse;
use MiaKiwi\Kaphpir\Responses\ResponseStatus;
use MiaKiwi\Kaphpir\IData;
use MiaKiwi\Kaphpir\Errors\Error;
use MiaKiwi\Kaphpir\Metadata\Metadata;
use MiaKiwi\Kaphpir\Metadata\MetadataMode;
use MiaKiwi\Kaphpir\Settings\Settings;
use MiaKiwi\Kaphpir\Settings\DefaultSettings;

class Response implements IResponse
{
    public readonly string $id;
    private ResponseStatus $status;
    protected static string $version = '25.1.0';
    private mixed $data = null;
    private ?string $message = null;
    private ?Error $error = null;
    private ?Metadata $metadata = null;
    private ?Settings $settings = null;

    /**
     * Creates a new Response object.
     * @param null|string $message The message to be included in the response.
     * @param null|\MiaKiwi\Kaphpir\Responses\ResponseStatus $status The status of the response.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $error An error object or exception to be included in the response.
     * @param null|string $id The identifier for the response.
     * @param mixed $data A reference to the data object to be included in the response.
     * @param null|\MiaKiwi\Kaphpir\Metadata\Metadata|array $metadata The metadata to be included in the response.
     * @param null|\MiaKiwi\Kaphpir\Settings\Settings $settings The settings object to be used for configuration.
     */
    public function __construct(
        ?string $message = null,
        ?ResponseStatus $status = null,
        null|Error|Exception $error = null,
        ?string $id = null,
        ?IData &$data = null,
        null|Metadata|array $metadata = null,
        ?Settings $settings = null
    ) {
        // If no settings are provided, use the default settings
        $this->settings = $settings ?? DefaultSettings::getInstance();

        // Set the ID to a unique value if not provided
        $this->id = $id ?? uniqid('response_', true);

        // If no status is provided, set it to the default success status
        $this->status = $status ?? ResponseStatus::Success;

        // Process the data if provided
        $this->setData($data ?? null);

        // Set the message
        $this->message = $message ?? null;

        // Process the error if provided
        $this->setError($error ?? null);

        // Process the metadata if provided
        $this->setMetadata($metadata ?? null);
    }

    // ----- SETTERS ----- \\
    /**
     * Sets the status of the response.
     * @param \MiaKiwi\Kaphpir\Responses\ResponseStatus $status
     * @return void
     */
    public function setStatus(ResponseStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * Sets the status of the response to success.
     * @return void
     */
    public function makeSuccess(): void
    {
        $this->setStatus(ResponseStatus::Success);
    }

    /**
     * Sets the status of the response to error.
     * @return void
     */
    public function makeError(): void
    {
        $this->setStatus(ResponseStatus::Error);
    }

    /**
     * Sets the status of the response to success and returns the response object for method chaining.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     * @return self
     */
    public function success(null|Error|Exception $e = null): self
    {
        $this->makeSuccess();

        if ($e instanceof Exception) {
            $this->error = Error::fromException($e);
        } else {
            $this->error = $e;
        }

        return $this;
    }

    /**
     * Sets the status of the response to error, sets the error, and returns the response object for method chaining.
     * @param \MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     * @return void
     */
    public function error(Error|Exception $e): self
    {
        $this->makeError();

        if ($e instanceof Exception) {
            $this->error = Error::fromException($e);
        } else {
            $this->error = $e;
        }

        return $this;
    }



    /**
     * Sets the data of the response by reference.
     * @param mixed $data
     * @return void
     */
    public function setData(mixed $data): void
    {
        if ($data instanceof IData) {
            $this->data = $data->getKapirValue(); // Convert the data to an array representation
        } else {
            $this->data = $data;
        }
    }

    /**
     * Sets the data of the response by reference and returns the response object for method chaining.
     * @param mixed $data
     * @return void
     */
    public function data(mixed $data): self
    {
        $this->setData($data);

        return $this;
    }



    /**
     * Sets the message of the response.
     * @param null|string $message
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * Sets the message of the response and returns the response object for method chaining.
     * @param null|string $message
     * @return self
     */
    public function message(?string $message): self
    {
        $this->setMessage($message);

        return $this;
    }



    /**
     * Sets the error of the response.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     * @return void
     */
    public function setError(null|Error|Exception $e): void
    {
        if ($e instanceof Exception) {
            $this->error = Error::fromException($e);
        } else {
            $this->error = $e;
        }
    }

    /**
     * Resets the error of the response.
     * @return void
     */
    public function clearError(): void
    {
        $this->error = null;
    }



    /**
     * Sets the metadata of the response.
     * @param null|\MiaKiwi\Kaphpir\Metadata\Metadata|array $metadata
     * @return void
     */
    public function setMetadata(null|Metadata|array $metadata): void
    {
        if (is_array($metadata)) {
            $this->metadata = Metadata::fromArray($metadata);
        } else {
            $this->metadata = $metadata;
        }
    }

    /**
     * Adds a metadata key-value pair to the response.
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function addMetadata(string $key, mixed $value): void
    {
        if ($this->metadata === null) {
            $this->metadata = new Metadata();
        }

        $this->metadata->addMetadata($key, $value);
    }

    /**
     * Removes a metadata key-value pair from the response.
     * @param string $key
     * @return void
     */
    public function removeMetadata(string $key): void
    {
        if ($this->metadata !== null) {
            $this->metadata->removeMetadata($key);
        }
    }

    /**
     * Clears all metadata from the response.
     * @return void
     */
    public function clearMetadata(): void
    {
        $this->metadata = null;
    }

    /**
     * Edits the metadata of the response and returns the response object for method chaining.
     * @param null|\MiaKiwi\Kaphpir\Metadata\Metadata|array $metadata
     * @return self
     */
    public function metadata(null|Metadata|array $metadata, MetadataMode $mode = MetadataMode::Merge): self
    {
        if ($mode === MetadataMode::Replace) {
            $this->clearMetadata();
        }

        if (is_array($metadata)) {
            $this->setMetadata($metadata);
        } elseif ($metadata instanceof Metadata) {
            $this->metadata = $metadata;
        }

        return $this;
    }



    /**
     * Sets the settings object of the response.
     * @param \MiaKiwi\Kaphpir\Settings\Settings $settings
     * @return void
     */
    public function setSettings(Settings $settings): void
    {
        $this->settings = $settings;
    }

    /**
     * Sets a specific setting value in the response settings object.
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setSetting(string $key, mixed $value): void
    {
        $this->getSettings()->setSetting($key, $value);
    }

    /**
     * Sets a specific setting value in the response settings and returns the response object for method chaining.
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function setting(string $key, mixed $value): self
    {
        $this->setSetting($key, $value);

        return $this;
    }



    // ----- GETTERS ----- \\
    /**
     * Returns the status of the response.
     * @return \MiaKiwi\Kaphpir\Responses\ResponseStatus
     */
    public function getStatus(): ResponseStatus
    {
        return $this->status;
    }



    /**
     * Returns the version of the response format.
     * @return string
     */
    public static function getVersion(): string
    {
        return static::$version;
    }



    /**
     * Returns the data of the response.
     * @param mixed $data
     */
    public function getData(): mixed
    {
        return $this->data;
    }



    /**
     * Returns the message of the response.
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }



    /**
     * Returns the error of the response.
     * @param null|\MiaKiwi\Kaphpir\Errors\Error|\Exception $e
     */
    public function getError(): ?Error
    {
        return $this->error;
    }



    /**
     * Returns the metadata of the response.
     * @return null|\MiaKiwi\Kaphpir\Metadata\Metadata
     */
    public function getMetadata(): ?Metadata
    {
        return $this->metadata;
    }

    /**
     * Returns the metadata of the response with default and computed values included.
     * @return null|\MiaKiwi\Kaphpir\Metadata\Metadata
     */
    public function getMeta(): ?Metadata
    {
        $meta = $this->metadata ?? new Metadata();

        if ($this->getSetting('response.metadata.default', false)) {
            $meta->setMetadata($this->getSetting('response.metadata.default', []), MetadataMode::Merge);
        }

        if ($this->getSetting('response.metadata.response_id.enabled', true)) {
            $meta->addMetadata('response_id', $this->id);
        }
        if ($this->getSetting('response.metadata.response_time.enabled', true)) {
            $meta->addMetadata('response_time', date($this->getSetting('response.metadata.response_time_format', 'Y-m-d H:i:sP')));
        }

        return $meta;
    }

    /**
     * Returns a specific metadata value by key or a default value if the key does not exist.
     * @param string $key
     * @param mixed $default
     * @return void
     */
    public function getMetadatum(string $key, mixed $default = null): mixed
    {
        if ($this->metadata !== null) {
            return $this->metadata->getMetadatum($key, $default);
        }

        return $default;
    }



    /**
     * Returns the settings object of the response.
     * If no settings object is set, it returns the default settings object.
     * @return \MiaKiwi\Kaphpir\Settings\Settings
     */
    public function getSettings(): Settings
    {
        return $this->settings ?? DefaultSettings::getInstance();
    }

    /**
     * Returns a specific setting value from the response settings.
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getSetting(string $key, mixed $default = null): mixed
    {
        return $this->getSettings()->getSetting($key, $default);
    }



    /**
     * Returns the KAPIR type as a literal value to be used in a KAPIR response.
     * @return mixed
     */
    public function getKapirValue(): mixed
    {
        $array = [
            'status' => $this->getStatus()->getKapirString(),
            'version' => $this::getVersion(),
            'data' => $this->getData(),
            'message' => $this->getMessage(),
            'error' => $this->getError()?->getKapirValue(),
        ];

        if ($this->getSetting('response.metadata.enabled', true)) {
            $array['metadata'] = $this->getMeta()?->getKapirValue();
        } else {
            $array['metadata'] = null;
        }

        return $array;
    }



    /**
     * Checks if the reponse is compliant with KAPIR.
     * @return void
     */
    public function isValid(): bool
    {
        // Check if the response is valid

        // 3.8.1 Status must be "success" or "error"
        if ($this->getStatus() === null) {
            return false;
        }

        // 3.8.2 Version must not be empty
        if (empty($this::getVersion()) || $this::getVersion() === null) {
            return false;
        }

        // 3.8.4 Message must be a string or null
        if ($this->getMessage() !== null && !is_string($this->getMessage())) {
            return false;
        }

        // 3.8.5 Error must be an error object or null
        if ($this->getError() !== null && !$this->getError()->isValid()) {
            return false;
        }

        // 3.8.6 Metadata must be a metadata object or null
        if ($this->getMetadata() !== null && !$this->getMetadata()->isValid()) {
            return false;
        }

        // 4.1 If the status is "error", the error must not be null and the data must be null
        if ($this->getStatus() === ResponseStatus::Error) {
            if ($this->getError() === null || $this->getData() !== null) {
                return false;
            }
        }

        // 4.1 If the status is "success", the error must be null
        if ($this->getStatus() === ResponseStatus::Success) {
            if ($this->getError() !== null) {
                return false;
            }
        }

        return true;
    }
}