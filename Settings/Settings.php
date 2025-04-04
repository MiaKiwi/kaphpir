<?php

namespace MiaKiwi\Kaphpir\Settings;

class Settings
{
    private array $settings = [];

    public function __construct(array $settings = [])
    {
        $this->setSettings($settings);
    }

    /**
     * Sets a setting value by its key.
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setSetting(string $key, mixed $value): void
    {
        $this->settings[$key] = $value;
    }

    /**
     * Returns the value of a setting by its key.
     * If the key does not exist, it returns the provided default value.
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getSetting(string $key, mixed $default = null): mixed
    {
        return $this->settings[$key] ?? $default;
    }

    private function setSettings(array $settings): void
    {
        $this->clearSettings();

        foreach ($settings as $key => $value) {
            if (!is_string($key)) {
                throw new \InvalidArgumentException('Key must be a string.');
            }

            $this->settings[$key] = $value;
        }
    }

    /**
     * Removes a setting by its key.
     * @param string $key
     * @return void
     */
    public function removeSetting(string $key): void
    {
        unset($this->settings[$key]);
    }

    /**
     * Clears all settings.
     * @return void
     */
    public function clearSettings(): void
    {
        $this->settings = [];
    }
}