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
        //randomly connecting users.
        //Randoml sending and approving user request.


       $users=  User::get();
       foreach($users as $user){
            $follow = User::inRandomOrder()->get();
            //Here were are connent/sent request to half users only.
            //half user leaving for suggestion and received.
            foreach(range(1,$follow->count()/2) as $i){
                // Follow if not me and not follower.
                if($follow[$i]->id != $user->id && 
                Follow::where('followerId',$follow[$i]->id)
                ->where('followeeId',$user->id)->doesntExist())
                { 
                    Follow::updateOrCreate([
                        'followerId' => $user->id,
                        'followeeId' => $follow[$i]->id,
                        //randomly approve or pending request.
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
