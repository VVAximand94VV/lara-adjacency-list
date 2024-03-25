<?php

namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList;

use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Query\ModelQueries;
use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Tree\Builder;

trait UseQuery
{
    public static function getTree()
    {
        $self = new self();
        $builder = new Builder($self);
        return $tree = $builder->getTree();
    }


    public static function onlyRoots()
    {
        $self = new self();
        return ModelQueries::getRootsNodes($self);
    }

}
