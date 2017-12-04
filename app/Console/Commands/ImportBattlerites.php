<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Champion;
use App\Battlerite;

class ImportBattlerites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:battlerites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all scraped champions\' battlerites.';

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
            $champion = Champion::where('name', $c['champion'])->first();

            foreach ($c['battlerites'] as $b) {
                Battlerite::updateOrCreate(
                    [
                        'champion_id'   => $champion->id,
                        'name'          => $b['name']
                    ],
                    [
                        'description'   => $b['description'],
                        'type'          => $b['type'],
                        'skill'         => str_replace('_', ' ', $b['skill'])
                    ]
                );
            }
        }
    }
}
