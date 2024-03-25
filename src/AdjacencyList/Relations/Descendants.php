<?php


namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Relations;


trait Descendants
{
    public function children()
    {
        return $this->hasMany(self::class, $this->getParentIdName(), $this->getLocalIdName())->get();
    }

    public function descendantsTree()
    {
        return $this->hasMany(self::class, $this->getParentIdName(), $this->getLocalIdName())->with('descendantsTree');
    }

    public function allDescendants()
    {
        $descendants = $this->children()->get();
        foreach($descendants as $descendant){
            $descendants = $descendants->merge($descendant->children()->get();
            if($descendant->children()){
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
