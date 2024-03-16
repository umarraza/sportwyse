<?php

namespace App\Console\Commands;

use App\Models\Camp;
use App\Models\Club;
use App\Models\Team;
use App\Models\Staff;
use App\Models\Player;
use App\Import\CampsImport;
use App\Import\TeamsImport;
use App\Import\UsersImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportMongoDBData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to import data from mongo db database into sql server.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // IMPORTANT: The clubs has alreay been seeded in database, check the ClubTableSeeder.php file.
        // Just create a new database, and run following commands
        // php artisan migrate --seed
        // php artisan app:import

        DB::transaction(function () {

            $this->newLine();
            $this->info('Esttablishing the relation between players and teams...');
            $playersCollection = Player::whereNotNull('m_teams')->get();

            $this->withProgressBar($playersCollection, function ($player) {
                collect(json_decode($player->m_teams))->each(function ($teamId) use ($player) {

                    $team = Team::where('m_id', $teamId)->first();

                    if ($team) {
                        $player->teams()->attach($team->id);
                    }

                });
            });

            Club::each(function ($club) {

                $this->info('Importing users...');
                $this->newLine();
                $this->importUsers($club);

                $this->newLine();
                $this->info('Importing teams...');
                $this->newLine();
                $this->importTeams($club);

                $this->newLine();
                $this->info('Importing camps...');
                $this->newLine();
                $this->importCamps($club);

            });

            $this->newLine();
            $this->info('Esttablishing the relation between camps and teams...');

            $campsCollection = Camp::whereNotNull('m_teams')->get();

            $this->withProgressBar($campsCollection, function ($camp) {

                $teams = collect(json_decode($camp->m_teams));

                $teams->each(function ($teamId) use ($camp) {

                    $team = Team::where('m_id', $teamId)->first();

                    if ($team) {
                        $team->camps()->attach($camp->id);
                    }

                });
            });

            $this->newLine();
            $this->info('Esttablishing the relation between staff and teams...');
            $teamsCollection = Team::whereNotNull('m_staff_member_ids')->get();

            $this->withProgressBar($teamsCollection, function ($team) {
                collect(json_decode($team->m_staff_member_ids))->each(function ($staffId) use ($team) {

                    $staff = Staff::where('m_id', $staffId)->first();

                    if ($staff) {
                        $team->staffMembers()->attach($staff->id);
                    }

                });
            });

            $this->newLine();
            $this->info('Esttablishing the relation between players and teams...');
            $playersCollection = Player::whereNotNull('m_teams')->get();

            $this->withProgressBar($playersCollection, function ($player) {
                collect(json_decode($player->m_teams))->each(function ($teamId) use ($player) {

                    $team = Team::where('m_id', $teamId)->first();

                    if ($team) {
                        $player->teams()->attach($team->id);
                    }

                });
            });
        });
    }

    private function importTeams($club)
    {
        $collection = $this->getFileContents('storage/app/public/sportwyse/rush_teams.json');

        $this->withProgressBar($collection, function ($team) use ($club) {

            if ($team->clubId === $club->club_id) {
                TeamsImport::import($team, $club);
            }

        });

        $this->newLine();
        $this->info('Teams imported succesfully.');

    }

    private function importCamps($club)
    {
        $collection = $this->getFileContents('storage/app/public/sportwyse/rush_camps.json');

        $this->withProgressBar($collection, function ($camp) use ($club) {

            if ($camp->clubId === $club->club_id) {
                CampsImport::import($camp, $club);
            }

        });

        $this->newLine();
        $this->info('Camps imported succesfully.');
    }

    private function importUsers($club)
    {
        $collection = $this->getFileContents('storage/app/public/sportwyse/v1/rushsoccer_users.json');

        $this->withProgressBar($collection, function ($model) use ($club) {

            if ($model->clubId === $club->club_id) {
                UsersImport::import($model, $club);
            }

        });

        $this->newLine();
        $this->info('Users imported succesfully.');
    }

    private function getFileContents($filePath)
    {
        $contents = File::get(base_path($filePath));

        $json = json_decode($contents);

        return collect($json);
    }
}
