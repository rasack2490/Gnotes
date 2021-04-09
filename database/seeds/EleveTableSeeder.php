<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EleveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('eleves')->insert([
            ['id'=>1, 'nom'=>'NANA', 'prenom'=>'abdoul razack', 'email'=>'razack@gmail.com', 'matricule'=>'MB2010', 'password'=>bcrypt('123'), 'nationalite'=>'burkinabe', 'naissance'=>'12/10/2000', 'sexe'=>'true', 'ville'=>'ouagadougou', 'telephone'=>'71344116', 'adresse'=>'saaba', 'phone_besoin'=>'70294400', 'nom_pere'=>'NANA malik', 'nom_mere'=>'DJIRE Mariam' ]
        ]);
    }
}
