<?php


namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Query;


class ModelQueries
{
    public static function getRootsNodes($model)
    {
        return $model::where($model->getParentIdName(), null)->get();
    }
}
