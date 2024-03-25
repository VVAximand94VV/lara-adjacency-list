<?php

namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Tree;

class Builder
{

    protected $localId;
    protected $parentId;
    protected $nodes;

    public function __construct($model)
    {
        $this->nodes = $model::all();
        $this->localId = $model->getLocalIdName();
        $this->parentId = $model->getParentIdName();
    }

    public function getTree()
    {
        return $this->createTree();
    }

    /**
     * @param $nodes
     * @return mixed
     */
    private function createTree()
    {
        // get root nodes
        $parents = $this->nodes->where($this->parentId, 0);
        $this->formatTree($parents, $this->nodes);
        return $parents;
    }

    /**
     * @param $parents
     * @param $nodes
     */
    private function formatTree($parents, $nodes)
    {
        foreach($parents as $parent){
            // add children nodes in parent
            $parent->children = $nodes->where($this->parentId, $parent->getLocalIdValue())->values();
            // if children not null
            if($parent->children->isNotEmpty()){
                // recursively call the function
                $this->formatTree($parent->children, $nodes);
            }
        }
    }
}
