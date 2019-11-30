<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $user           = new \App\User;
        $user->name     = 'Demo';
        $user->email    = 'demo@test.com';
        $user->password =  bcrypt(123456);
        $user->save();
		
		factory(\App\User::class, 9)->create();
    }
}