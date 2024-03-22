<?php
namespace Aximand\LaraAdjacencyList;

use Aximand\LaraAdjacencyList\Console\Commands\AddParentIdCommand;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{

    public function boot(): void
    {

    }

    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AddParentIdCommand::class,
            ]);
        }
    }

}