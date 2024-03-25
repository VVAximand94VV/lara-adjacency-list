# Lara Adjacency List

<p>Simple plugin for working with a Adjacency List for laravel.</p>

*In dev.* 


# Compatibility

<p>Laravel 8.x + version.</p>

# Installation

<p>Install package:</p>

```
composer require twocoffeecups/lara-adjacency-list
```

<p>Use the AdjacencyList trait in your model:</p>

```
use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\HasAdjacencyList;

class YourModel extends Model
{
    use HasAdjacencyList;
}
```

<p>Add column in your table schema:</p>

```
Schema::create('your_table_name', function (Blueprint $table) {
    $table->id();
    $table->foreignId('parentId')->nullable()->index('parentIdx')->constrained('your_table_name');
});    
```

<p>Or run this command if you already have a table in the database and enter table name:</p>

```
php artisan adjacency-list:add-parent-id
```

# Usage

### Keys
<p>If you already have a table with the parent and local keys, then you can redefine their names in the model:</p>

```
use TwoCoffeeCups\LaraAdjacencyList\AdjacencyList\HasAdjacencyList;

class YourModel extends Model
{
    use HasAdjacencyList;
    
    public function getLocalIdName(): string
    {
        return 'your_local_id_name';
    }
    
    public function getParentIdName(): string
    {
        return 'your_parent_id_name';
    }
}
```

### Relationships
<p>The trait has various relationships:</p>

- ```children()``` Get only children nodes.
- ```parent()``` Get parent node.
- ```allAncestors()``` Get ancestors list.
- ```allAncestorsAndMe()``` Get ancestors list, and self.
- ```descendantsTree()``` Get descendants tree.
- ```allDescendants()``` Get descendants list.
- ```allAncestorsAndMe()``` Get ancestors list, and self.

<p>Methods usage:</p>

```
$node = Model::find($id);
$node->allAncestors();
```  

### Tree

<p>The static method <code>getTree()</code> allows you to get a tree of all elements starting from the roots:</p> 

```
$tree = Model::getTree();
```

<p>Get method <code>descendantsTree()</code> to create a tree of all descendants:</p>

```
$tree = $model->descendantsTree()->get();
```

<p>The static method <code>onlyRoots()</code> allows you to get only the root elements:</p>

```angular2html
$roots = Model::onlyRoots();
```


