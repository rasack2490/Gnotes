<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAnneeScolaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_annees')->insert([
            [
                'list_type'=>'semestrielle'
            ],
            [
                'list_type'=>'trimestrielle'
            ]

        ]);
    }
}
