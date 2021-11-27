<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class excel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\AccountImport, public_path('/up') . "/1.xlsx" );
        return Command::SUCCESS;
    }
}
