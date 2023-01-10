<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'prenom' => 'djila yvan',
            'email' => 'djila@gmail.com',
            'password' => bcrypt('djila'),
            'profile' =>'fdfdflkjfld',
        ]);
        $admin = User::create([
            'name' => 'responsable',
            'prenom' => 'awawou raye',
            'email' => 'respo1@gmail.com',
            'password' => bcrypt('respo1'),
            'profile' =>'fdfdflkdfdfdjfld',
        ]);
        // $admin = User::create([
        //     'name' => 'Visitor',
        //     'email' => 'visit@gmail.com',
        //     'password' => bcrypt('visit'),
        // ]);

        //$users = \App\Models\User::factory(2)->create();
    }
}
