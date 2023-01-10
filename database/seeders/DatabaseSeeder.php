<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\SchoolTableSeeder;
use Database\Seeders\DomaineTableSeeder;
use Database\Seeders\DepartementTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LaratrustSeeder::class);
         $this->call(UserTableSeeder::class);
        // $this->call(SchoolTableSeeder::class);
        // $this->call(DepartementTableSeeder::class);
        // $this->call(DomaineTableSeeder::class);
        //  \App\Models\User::factory(10)->create();
    }
}
