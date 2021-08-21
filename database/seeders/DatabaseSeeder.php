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
        DB::table('users')->insert([
            'name' => 'Vinicius',
            'email' => 'vinicius@gmail.com',
            'password' => Hash::make('12345678'),
            //id 1
        ]);

        DB::table('users')->insert([
            'name' => 'Paulo',
            'email' => 'paulo@gmail.com',
            'password' => Hash::make('12345678'),
            //id 2
        ]);
        $this->call(LaratrustSeeder::class);   
        
        User::find(2)->attachRole('professor'); // user Paulo
        User::find(1)->attachRole('admin'); // user Vinicius

        // \App\Models\User::factory(10)->create();
        
    }
}

