<?php


namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Relations;

trait Ancestors
{
    /**
     * Get parent
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(self::class, $this->getLocalIdName(), $this->getParentIdName())->first();
    }

    public function allAncestors()
    {
        $ancestors = $this->where($this->getLocalIdName(), '=', $this->getParentIdValue())->get();
        while ($ancestors->last() && ($ancestors->last()->getParentIdValue() !== null))
        {
            $parent = $this->where($this->getLocalIdName(), '=', $ancestors->last()->getParentIdValue())->get();
            $ancestors = $ancestors->merge($parent);
        }
        return $ancestors;
    }

    public function allAncestorsAndMe()
    {
        $ancestors = $this->allAncestors();
        return $ancestors->push($this);
    }
}