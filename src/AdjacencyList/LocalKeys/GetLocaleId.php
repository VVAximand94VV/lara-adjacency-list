<?php


namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\LocalKeys;


trait GetLocaleId
{
    /**
     * Get table locale key name.
     * @return string
     */
    public function getLocalIdName(): string
    {
        return 'id';
    }

    protected function getLocalIdValue()
    {
        return $this->{$this->getLocalIdName()};
    }
}