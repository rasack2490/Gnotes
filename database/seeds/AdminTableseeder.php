<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['id_user'=>1, 'nom' => 'admin','prenom'=> 'admin', 'email' =>'admin@admin.com', 'password' => bcrypt('admin'), 'numero'=>'64474444', 'role' =>true ]

        ]);
    }
}
