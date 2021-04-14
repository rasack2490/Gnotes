<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AdminTableseeder::class);
        $this->call(EleveTableSeeder::class);
        $this->call(ClasseTableSeeder::class);
        $this->call(TypeAnneeScolaireTableSeeder::class);
    }
}
