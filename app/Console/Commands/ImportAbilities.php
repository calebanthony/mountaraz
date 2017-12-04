<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Champion;
use App\Ability;

class ImportAbilities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:abilities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all scraped champions\' abilities.';

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

            foreach ($c['abilities'] as $a) {
                if (isset($a['details']['Energy Gain'])) {
                    $energyGain = rtrim($a['details']['Energy Gain'], '%');
                } else {
                    $energyGain = 0;
                }

                Ability::updateOrCreate(
                    [
                        'champion_id'   => $champion->id,
                        'name'          => $a['name']
                    ],
                    [
                        'hotkey'        => implode(' + ', $a['hotkey']),
                        'cooldown'      => rtrim($a['cooldown'], 's'),
                        'energy_cost'   => $a['energy'],
                        'energy_gain'   => $energyGain,
                        'cast_time'     => rtrim($a['casttime'], 's'),
                        'description'   => $a['description']
                    ]
                );
            }
        }
    }
}
