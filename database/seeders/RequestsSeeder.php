<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users=  User::get();
       foreach($users as $user){
            $follow = User::inRandomOrder()->get();
            foreach(range(1,$follow->count()/2) as $i){
                // Follow if not me and not follower.
                if($follow[$i]->id != $user->id && 
                Follow::where('followerId',$follow[$i]->id)
                ->where('followeeId',$user->id)->doesntExist())
                { 
                    Follow::updateOrCreate([
                        'followerId' => $user->id,
                        'followeeId' => $follow[$i]->id,
                        'approved'   => rand(0,1), 
                    ],[
                        'followerId' => $user->id,
                        'followeeId' => $follow[$i]->id,
                    ]);
                }
            }
       }
    }
}
