<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Professor',
        //     'email' => 'professor@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     //id 2
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Aluno',
        //     'email' => 'aluno@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     //id 3
        // ]);
        // $this->call(LaratrustSeeder::class);   
        
        User::find(3)->attachRole('aluno'); // user aluno
        User::find(2)->attachRole('professor'); // user professor
        User::find(1)->attachRole('admin'); // user admin

        User::find(3)->attachPermissions([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]); // user aluno
        User::find(2)->attachPermissions([1,2,3,4,6,9,10,11,12,13,14,15,16,17,18]); // user professor
        User::find(1)->attachPermissions([10,14,16,17,18]); // user admin

        // \App\Models\User::factory(10)->create();
        
    }
}

