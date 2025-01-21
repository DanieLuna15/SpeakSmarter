<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
     public function run()
     {
         $this->call([
             LevelSeeder::class,
             RoleSeeder::class,
             UserSeeder::class,
         ]);
     }
}
