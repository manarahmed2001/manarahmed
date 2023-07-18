<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'marahramzi',
            'email' => 'marah@example',
            'first_name' => 'marah' ,
            'last_name' => 'ramzi' ,
            'is_admin' => 1,
            'is_active' => 0 ,
            'password' =>Hash::make('passwordm2345'),
        ]);
        DB::table('users')->insert([
            'username' => 'reemasiam',
            'email' => 'reema@example',
            'first_name' => 'reema' ,
            'last_name' => 'siam' ,
            'is_admin' => 0,
            'is_active' => 1 ,
            'password' =>Hash::make('passwordm2345'),
        ]);
        DB::table('users')->insert([
            'username' => 'gharamahmed',
            'email' => 'gharam@example',
            'first_name' => 'gharam' ,
            'last_name' => 'ahmed' ,
            'is_admin' => 1,
            'is_active' => 0 ,
            'password' =>Hash::make('passwordm2345'),
        ]); 
        DB::table('users')->insert([
            'username' => 'linaahmed',
            'email' => 'lina@example',
            'first_name' => 'lina' ,
            'last_name' => 'ahmed' ,
            'is_admin' => 1,
            'is_active' => 1 ,
            'password' =>Hash::make('passwordm2345'),
        ]);
        DB::table('users')->insert([
            'username' => 'maramahmed',
            'email' => 'maram@example',
            'first_name' => 'maram' ,
            'last_name' => 'ahmed' ,
            'is_admin' => 1,
            'is_active' => 0 ,
            'password' =>Hash::make('passwordm2345'),
        ]);
    } 
}
