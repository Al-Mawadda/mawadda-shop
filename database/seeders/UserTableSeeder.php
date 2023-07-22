<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\User;

class UserTableSeeder extends Seeder{

    public function run(){
        User::create([
            'name'           =>  'ali',
            'password'       =>  Hash::make('123'),
            'phone'          =>  '07736657369',
            'type'			 =>  0,
        ]);        
    }
}
