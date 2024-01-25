<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClubTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\ActivityTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory()->create();
        $this->call(RoleSeeder::class);
        $this->call(ClubTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
    }
}
