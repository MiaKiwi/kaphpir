<?php

namespace MiaKiwi\Kaphpir\Errors;

use \Exception;
use MiaKiwi\Kaphpir\Errors\NestedError;

class Error extends NestedError
{
    protected array $errors = [];

    public function __construct(string $code, ?string $message = null, array $errors = [])
    {
        parent::__construct($code, $message);
        $this->setNestedErrors($errors);
    }

    // ----- SETTERS ----- \\
    /**
     * Adds a nested error to the list of errors.
     * @param \MiaKiwi\Kaphpir\Errors\NestedError $error
     * @return void
     */
    public function addNestedError(NestedError $error): void
    {
        $this->errors[] = $error;
    }

    /**
     * Removes a nested error from the list of errors.
     * @param \MiaKiwi\Kaphpir\Errors\NestedError $error
     * @return void
     */
    public function removeNestedError(NestedError $error): void
    {
        $key = array_search($error, $this->errors, true);
        if ($key !== false) {
            unset($this->errors[$key]);
        }
    }

    /**
     * Clears all nested errors from the list of errors.
     * @return void
     */
    public function clearNestedErrors(): void
    {
        $this->errors = [];
    }

    /**
     * Sets the list of nested errors.
     * @param \MiaKiwi\Kaphpir\Errors\NestedError[] $errors
     * @throws \InvalidArgumentException if any of the errors are not instances of NestedError
     * @return void
     */
    public function setNestedErrors(array $errors): void
    {
        foreach ($errors as $error) {
            if (!$error instanceof NestedError) {
                throw new \InvalidArgumentException('All nested errors must be instances of NestedError.');
            }
        }

        $this->errors = $errors;
    }

    /**
     * Creates an Error instance from an Exception.
     * This method flattens the nested exceptions into a one-dimensional array of nested errors.
     * @param \Exception $exception
     * @return Error
     */
    public static function fromException(Exception $exception): self
    {
        $error = new Error($exception->getCode(), $exception->getMessage());

        // Flatten the nested exceptions into a one-dimensional array of nested errors
        $nestedErrors = [];

        $previous = $exception->getPrevious();
        while ($previous) {
            $nestedErrors[] = new NestedError($previous->getCode(), $previous->getMessage());
            $previous = $previous->getPrevious();
        }

        // Add the nested errors to the main error
        $error->setNestedErrors($nestedErrors);

        return $error;
    }

    // ----- GETTERS ----- \\
    /**
     * Returns the list of nested errors.
     * @return \MiaKiwi\Kaphpir\Errors\NestedError[]
     */
    public function getNestedErrors(): array
    {
        return $this->errors;
    }

    /**
     * Returns the number of nested errors.
     * @return int
     */
    public function getNestedErrorCount(): int
    {
        return count($this->errors);
    }

    /**
     * Returns errors by their code.
     * @param string $code
     * @return \MiaKiwi\Kaphpir\Errors\NestedError[]
     */
    public function getNestedErrorsByCode(string $code): array
    {
        $errors = [];

        foreach ($this->errors as $error) {
            if ($error->getCode() === $code) {
                $errors[] = $error;
            }
        }

        return $errors;
    }

    /**
     * Returns the KAPIR type as a literal value to be used in a KAPIR response.
     * @return mixed
     */
    public function getKapirValue(): mixed
    {
        $data = parent::getKapirValue();
        $data['errors'] = [];

        foreach ($this->errors as $error) {
            $data['errors'][] = $error->getKapirValue();
        }

        return $data;
    }

    /**
     * Checks if the KAPIR type is valid.
     * @return bool
     */
    public function isValid(): bool
    {
        // 3.4.1 Code must be a non-empty string
        if (empty($this->getCode())) {
            return false;
        }

        // 3.4.3 Errors must be an array of NestedError objects
        foreach ($this->getNestedErrors() as $nestedError) {
            if (!$nestedError->isValid()) {
                return false;
            }
        }

        return true;
    }
}