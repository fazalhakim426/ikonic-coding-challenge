<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Database\Seeder;  
use Illuminate\Support\Facades\Hash; 

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        User::factory()->create([ 
            'email' => 'test@ikonic.com',
            'password' => Hash::make('password'),
        ]); 
        User::factory()->count(100)->create();
    }
}