<?php

namespace MiaKiwi\Kaphpir\Metadata;

enum MetadataMode: int
{
    /**
     * Merges the new metadata with the existing metadata.
     * If a key already exists, its value will be replaced with the new value.
     */
    case Merge = 0;

    /**
     * Replaces the existing metadata with the new metadata.
     */
    case Replace = 1;
}