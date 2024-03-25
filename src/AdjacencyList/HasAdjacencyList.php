<?php

namespace TwoCoffeeCups\LaraAdjacencyList\AdjacencyList;

use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\LocalKeys\GetLocaleId;
use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\LocalKeys\GetParentId;
use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Relations\Ancestors;
use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\Relations\Descendants;

trait HasAdjacencyList
{
    use GetLocaleId, GetParentId, Ancestors, Descendants, UseQuery;

}
