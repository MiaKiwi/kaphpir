<?php

namespace MiaKiwi\Kaphpir;

interface IKapirType
{
    /**
     * Returns the KAPIR type as a literal value to be used in a KAPIR response.
     * @return mixed
     */
    public function getKapirValue(): mixed;

    /**
     * Checks if the KAPIR type is valid.
     * @return bool
     */
    public function isValid(): bool;
}