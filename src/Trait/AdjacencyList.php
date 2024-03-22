<?php

namespace Aximand\LaraAdjacencyList\Trait;

trait AdjacencyList
{
    public function getLocalIdName(): string
    {
        return 'id';
    }

    protected function getLocalIdValue(): int
    {
        return $this->{$this->getLocalIdName()};
    }

    public function getParentIdName(): string
    {
        return 'parentId';
    }

    protected function getParentIdValue(): null|int
    {
        return $this->{$this->getParentIdName()};
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, $this->getParentIdName(), $this->getLocalIdName());
    }

    public function parent()
    {
        return $this->belongsTo(self::class, $this->getLocalIdName(), $this->getParentIdName())->first();
    }

    public function descendantsTree(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, $this->getParentIdName(), $this->getLocalIdName())->with('descendantsTree');
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


    public function allDescendants()
    {
        $descendants = $this->children()->get();
        foreach($descendants as $descendant){
            $descendants = $descendants->merge($descendant->children()->get());
            if($descendant->children()->get()){
                $descendants = $descendants->merge($descendant->allDescendants());
            }
        }
        return $descendants;
    }

    public function allDescendantsAndMe()
    {
        $descendants = $this->allDescendants();
        return $descendants->prepend($this);
    }

}
