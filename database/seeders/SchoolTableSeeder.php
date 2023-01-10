<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$schools = \App\Models\School::factory(20)->create();
        $schools = new \App\Models\School();
        $schools->name = "ENS";
        $schools->description = "ecole normale";
        $schools->user_id = 1;
        $schools->save();
    }
}
