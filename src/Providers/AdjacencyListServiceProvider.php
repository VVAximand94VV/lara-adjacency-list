<?php
namespace TwoCoffeeCups\LaraAdjacencyList\Providers;

use Aximand\LaraAdjacencyList\Console\Commands\AddParentIdCommand;
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