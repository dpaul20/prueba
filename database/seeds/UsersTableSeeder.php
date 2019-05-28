<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'Deivy',
            'email'=>'dpaul_20@hotmail.com',
            'password'=>bcrypt('19503298'),
            'admin'=>true
        ]);
    }
}
