<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Schema;

class UpdateDevDB extends Command
{
    protected $signature   = 'dev:update-db';
    protected $description = 'Update dev db from production db';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $prod = DB::connection('prod');

        $tableRows = [];
        $tables = ['projects', 'products', 'pages'];
        foreach ($tables as $table) {
            $tableRows[$table] = $prod->select("select * from $table");
        }

        $current = DB::connection('mysql');
        Schema::disableForeignKeyConstraints();
        foreach ($tableRows as $table => $rows) {
            $current->table($table)->truncate();
            
            foreach ($rows as $row) {
                $current->table($table)->insert(get_object_vars($row));
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}