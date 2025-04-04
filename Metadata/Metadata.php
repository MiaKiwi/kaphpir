<?php

namespace MiaKiwi\Kaphpir\Metadata;

use MiaKiwi\Kaphpir\Metadata\MetadataMode;
use MiaKiwi\Kaphpir\IKapirType;

class Metadata implements IKapirType
{
    private array $metadatum = [];

    public function __construct(array $metadatum = [])
    {
        $this->setMetadata($metadatum, MetadataMode::Replace);
    }

    // ----- SETTERS ----- \\
    /**
     * Sets the metadata.
     * @param array $metadatum The metadata to set.
     * @param MetadataMode $mode The mode to use for setting the metadata. Replace to replace the existing metadata, Merge to merge with the existing metadata (overwriting existing keys).
     * @throws \InvalidArgumentException if a key is not a string.
     */
    public function setMetadata(array $metadatum, MetadataMode $mode = MetadataMode::Replace): void
    {
        if ($mode === MetadataMode::Replace) {
            $this->clearMetadata();
        }

        foreach ($metadatum as $key => $value) {
            if (!is_string($key)) {
                throw new \InvalidArgumentException('Key must be a string.');
            }

            $this->metadatum[$key] = $value;
        }
    }

    /**
     * Adds a metadata key-value pair to the metadata.
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function addMetadata(string $key, mixed $value): void
    {
        $this->setMetadata([$key => $value], MetadataMode::Merge);
    }

    /**
     * Removes a metadata key-value pair from the metadata.
     * @param string $key
     * @return void
     */
    public function removeMetadata(string $key): void
    {
        unset($this->metadatum[$key]);
    }

    /**
     * Clears all metadata from the metadata.
     * @return void
     */
    public function clearMetadata(): void
    {
        $this->metadatum = [];
    }

    /**
     * Creates a Metadata object from an array.
     * @param array $data
     * @return Metadata
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->setMetadata($data, MetadataMode::Replace);
        return $instance;
    }

    // ----- GETTERS ----- \\
    /**
     * Returns the metadata.
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadatum;
    }

    /**
     * Returns a specific metadata value by key or a default value if the key does not exist.
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getMetadatum(string $key, mixed $default = null): mixed
    {
        return $this->metadatum[$key] ?? $default;
    }

    /**
     * Returns the KAPIR type as a literal value to be used in a KAPIR response.
     * @return mixed
     */
    public function getKapirValue(): mixed
    {
        return $this->getMetadata();
    }

    /**
     * Checks if the KAPIR type is valid.
     * @return bool
     */
    public function isValid(): bool
    {
        return true;
    }
}