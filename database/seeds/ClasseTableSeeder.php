<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('classes')->insert([
            [
                'list_classe'=>'6 ème'
            ],
            [
                'list_classe'=>'5 ème'
            ],
            [
                'list_classe'=>'4 ème'
            ],
            [
                'list_classe'=>'3 ème'
            ],
            [
                'list_classe'=>'Seconde A'
            ],
            [
                'list_classe'=>'Seconde C'
            ],
            [
                'list_classe'=>'Première A'
            ],
            [
                'list_classe'=>'Première D'
            ],
            [
                'list_classe'=>'Première C'
            ],
            [
                'list_classe'=>'Terminal A'
            ],
            [
                'list_classe'=>'Terminal D'
            ],
            [
                'list_classe'=>'Terminal C'
            ]

        ]);
    }
}
