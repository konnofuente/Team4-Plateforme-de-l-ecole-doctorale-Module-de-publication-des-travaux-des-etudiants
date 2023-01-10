<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = new \App\Models\Departement();
        $departements->name = "INFO";
        $departements->description = "Departement d'informatique";
        $departements->school_id = 1;
        $departements->domaine_id = 1;
        $departements->save();
    }
}
