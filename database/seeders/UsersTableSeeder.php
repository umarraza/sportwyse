<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Mike',
            'last_name' => 'Han',
            'username' => 'mikehan',
            'email' => 'mike@sanjoserush.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('Super Admin');
    }
}
