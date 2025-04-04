<?php

namespace MiaKiwi\Kaphpir\Errors;

use MiaKiwi\Kaphpir\IKapirType;

class NestedError implements IKapirType
{
    protected string $code;
    protected ?string $message = null;

    public function __construct(string $code, ?string $message = null)
    {
        $this->setCode($code);
        $this->setMessage($message);
    }

    // ----- SETTERS ----- \\
    /**
     * Sets the error code.
     * @param string $code
     * @throws \InvalidArgumentException if the code is empty
     * @return void
     */
    public function setCode(string $code): void
    {
        if (empty($code)) {
            throw new \InvalidArgumentException('Code cannot be empty.');
        }

        $this->code = $code;
    }

    /**
     * Sets the error message.
     * @param string|null $message
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    // ----- GETTERS ----- \\
    /**
     * Returns the error code.
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Returns the error message.
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Returns the KAPIR type as a literal value to be used in a KAPIR response.
     * @return mixed
     */
    public function getKapirValue(): mixed
    {
        return [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ];
    }

    /**
     * Checks if the KAPIR type is valid.
     * @return bool
     */
    public function isValid(): bool
    {
        // 3.3.1 Code must be a non-empty string
        if (empty($this->code)) {
            return false;
        }

        return true;
    }
}