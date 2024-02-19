<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $clubs = [
                [
                    'first_name' => 'Mike',
                    'last_name' => 'Han',
                    'email' => 'mike@sanjoserush.com',
                    'password' => 'password',
                    'club' => ['name' => 'San Jose Rush', 'm_id' => '7a673cb5-e965-42a9-8614-00edb1d81f8a'],
                ],
                [
                    'first_name' => 'Michael',
                    'last_name' => 'Johnson',
                    'email' => 'michael.johnson@summitstructures.com',
                    'password' => 'password',
                    'club' => ['name' => 'Fremont Rush', 'm_id' => 'dd32a579-8058-4e6a-92c2-4271aa58bd39'],
                ],
                [
                    'first_name' => 'David',
                    'last_name' => 'Miller',
                    'email' => 'david.miller@probuildsolutions.com',
                    'password' => 'password',
                    'club' => ['name' => 'Colorado Rush', 'm_id' => '65c1c987-efcc-4c5f-8f29-04157daa2e36'],
                ],
                [
                    'first_name' => 'Brian',
                    'last_name' => 'Taylor',
                    'email' => 'brian.taylor@blueskybuilders.com',
                    'password' => 'password',
                    'club' => ['name' => 'SPI Rush', 'm_id' => '9d8e0151-f81e-4bd2-98e0-41706069c0cc'],
                ]
            ];
    
    
            foreach ($clubs as $club) 
            {
                $user = User::create([
                    'first_name' => $club['first_name'],
                    'last_name' => $club['last_name'],
                    'email' => $club['email'],
                    'password' => Hash::make($club['password']),
                    'm_club_id' => $club['club']['m_id'],
                    'email_verified_at' => now()
                ]);
    
                $user->club()->create([
                    'name' => $club['club']['name'],
                    'club_id' => $club['club']['m_id'],
                ]);

                $user->assignRole('Club');
            }
        });
    }
}
