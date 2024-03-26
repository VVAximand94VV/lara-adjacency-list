<?php
namespace TwoCoffeeCups\LaraAdjacencyList\Providers;

use TwoCoffeeCups\LaraAdjacencyList\Console\Commands\AddParentIdCommand;
use Illuminate\Support\ServiceProvider;

class AdjacencyListServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AddParentIdCommand::class,
            ]);
        }
    }

}
