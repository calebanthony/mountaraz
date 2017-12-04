<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Champion;

class ImportChampions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:champions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all scraped champions.';

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
     * @return mixed
     */
    public function handle()
    {
        $data = file_get_contents(base_path('/database/static/champions.json'));
        $champions = json_decode($data, true);

        foreach ($champions as $c) {
            Champion::updateOrCreate(
                [
                    'name'    => $c['champion'],
                ],
                [
                    'title'   => $c['title'],
                    'health'  => $c['health'],
                ]
            );
        }
    }
}
