<?php

namespace MiaKiwi\Kaphpir\Settings;

use MiaKiwi\Kaphpir\Settings\Settings;

class DefaultSettings extends Settings
{
    private static ?self $instance = null;

    private function __construct()
    {
        // Constructor is private to prevent instantiation from outside the class.

        // Initialize the default settings.
        parent::__construct([
            'response.metadata.enabled' => true, // Enable metadata by default.
            'response.metadata.response_id.enabled' => true, // Include response ID in metadata.
            'response.metadata.response_time.enabled' => true, // Include the response datetime in metadata.
            'response.metadata.response_time_format' => 'Y-m-d H:i:sP', // Default format for the response datetime.
            'response.metadata.default' => [], // Default metadata to be included in the response.

            'http.headers.kapir-version.enabled' => true, // Include the KAPIR version in the HTTP headers.
        ]);
    }

    /**
     * Returns the Settings object instance.
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}