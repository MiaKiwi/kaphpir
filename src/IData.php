<?php

namespace MiaKiwi\Kaphpir;

interface IData
{
    /**
     * Returns the data in a format compatible with KAPIR.
     * @return mixed
     */
    public function getKapirValue(): mixed;
}