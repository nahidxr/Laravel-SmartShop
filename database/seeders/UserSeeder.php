<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new User();
        $user->name="admin";
        $user->email="admin@gmail.com";
        $user->password=Hash::make("12345678");
        $user->is_admin=true; 
        $user->save();
        
    }
}
