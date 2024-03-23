<?php


namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\LocalKeys;


trait GetParentId
{
    /**
     * Get table parent id kay name.
     * @return string
     */
    public function getParentIdName(): string
    {
        return 'parentId';
    }

    protected function getParentIdValue()
    {
        return $this->{$this->getParentIdName()};
    }

}