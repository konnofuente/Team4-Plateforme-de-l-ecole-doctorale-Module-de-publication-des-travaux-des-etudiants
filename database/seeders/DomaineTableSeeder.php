<?php

namespace Database\Seeders;

use App\Models\Domaine;
use Illuminate\Database\Seeder;

class DomaineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domaine = new \App\Models\Domaine();
        $domaine->name = "INFORMATIQUE";
        $domaine->description = "Domaine d'informatique";
        $domaine->user_id = 1;
        $domaine->save();
    }
}
