<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'subjektai' => 'Informatika',
            'subjektai' => 'Programavimas',
            'subjektai' => 'Matematika',
            'subjektai' => 'Komp. architektura',
            'subjektai' => 'Komp. tinklai',
            'subjektai' => 'Grafika',
            'subjektai' => 'Zmogaus sauga',
            'subjektai' => 'Programavimas framework aplinkose',
            'subjektai' => 'Css',
            'subjektai' => 'Html',
            'subjektai' => 'PHP',
            'subjektai' => 'SQL',
            'subjektai' => 'Python',
        ]);

    }
}
