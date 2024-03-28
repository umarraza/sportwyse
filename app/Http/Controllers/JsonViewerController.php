<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guardian;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class JsonViewerController extends Controller
{
    public function index() {

        $contents = File::get(base_path('storage/app/public/sportwyse/rushsoccer_users.json'));
        
        $json = json_decode($contents);

        $collection = collect($json);

        $collection->each(function($model) {
            
            $user = User::create([
                'first_name' => $model->data->firstName,
                'last_name' => $model->data->lastName,
                'username' => $model->data->username,
                'email' => $model->data->email,
                'password' => Hash::make('password'),
            ]);
            
            $guardian = $user->guardian()->create([
                'phone' => $model->data->phone
            ]);

            collect($model->child)->each(function($child) use ($guardian) {
                
                $user = User::create([
                    'first_name' => $child->data->firstName,
                    'last_name' => $child->data->lastName,
                    'username' => $child->data->username,
    				'email' => $child->data->playerEmail ?? Str::random('5')."@gmail.com",
                    'password' => Hash::make('password'),
                ]);

                $user->player()->create([
                    'guardian_id' => $guardian->id,
                    'birth_date' => $child->data->username
                ]);
            });
        });
    }
}