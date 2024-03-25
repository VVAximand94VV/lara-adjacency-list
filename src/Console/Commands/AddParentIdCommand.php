<?php

namespace TwoCoffeeCups\LaraAdjacencyList\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddParentIdCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adjacency-list:add-parent-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add parent id column in table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->ask('Enter a table name:');
        /** TODO: сделать добавление parentId */
//        $query = DB::query("
//            ALTER TABLE forum.tags
//            ADD parentId BIGINT unsigned NULL,
//            ADD FOREIGN KEY (parentId) REFERENCES $table(id);
//        ");
//        if($query){
//            $this->info('The command was successful!');
//        }else{
//            $this->error('Error!');
//        }
    }
}
