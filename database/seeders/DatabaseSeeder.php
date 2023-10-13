<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'first_name' => 'Admin',
             'last_name' => 'Patel',
             'email' => 'admin@gmail.com',
             'status' => '1',
             'email_verified_at' => now(),
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
             'remember_token' => Str::random(10),
        ]);

         DB::table('countries')->insert(array(
             array('name' => 'India', 'created_at' => now(), 'updated_at' => now()),
             array('name' => 'Australia', 'created_at' => now(), 'updated_at' => now()),
             array('name' => 'Canada', 'created_at' => now(), 'updated_at' => now()),
         ));

         DB::table('states')->insert(array(
             array('country_id' => '1', 'name' => 'Gujarat', 'created_at' => now(), 'updated_at' => now()),
             array('country_id' => '1', 'name' => 'Rajasthan', 'created_at' => now(), 'updated_at' => now()),
             array('country_id' => '2', 'name' => 'Sydney', 'created_at' => now(), 'updated_at' => now()),
         ));

         DB::table('cities')->insert(array(
             array('state_id' => '1', 'name' => 'Surat', 'created_at' => now(), 'updated_at' => now()),
             array('state_id' => '1', 'name' => 'Baroda', 'created_at' => now(), 'updated_at' => now()),
             array('state_id' => '2', 'name' => 'Jaipur', 'created_at' => now(), 'updated_at' => now()),
         ));

         DB::table('hobbies')->insert(array(
             array('name' => 'Sports', 'created_at' => now(), 'updated_at' => now()),
             array('name' => 'Travelling', 'created_at' => now(), 'updated_at' => now()),
             array('name' => 'Music', 'created_at' => now(), 'updated_at' => now()),
             array('name' => 'Reading', 'created_at' => now(), 'updated_at' => now()),
             array('name' => 'Social Activities', 'created_at' => now(), 'updated_at' => now()),
         ));
    }
}
