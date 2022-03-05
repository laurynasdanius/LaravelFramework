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
        ]);
        Subject::create([
            'subjektai' => 'Programavimas'
        ]);
        Subject::create([
            'subjektai' => 'Matematika',
        ]);
        Subject::create([
            'subjektai' => 'Komp. architektura',
        ]);
        Subject::create([
            'subjektai' => 'Komp. tinklu architektura',
        ]);
        Subject::create([
            'subjektai' => 'Komp. tinklai',
        ]);
        Subject::create([
            'subjektai' => 'Grafika',
        ]);
        Subject::create([
            'subjektai' => 'Zmogaus sauga',
        ]);
        Subject::create([
            'subjektai' => 'Programavimas framework aplinkose',
        ]);
        Subject::create([
            'subjektai' => 'Css',
        ]);
        Subject::create([
            'subjektai' => 'Html',
        ]);
        Subject::create([
            'subjektai' => 'PHP',
        ]);
        Subject::create([
            'subjektai' => 'SQL',
        ]);
        Subject::create([
            'subjektai' => 'Python',
        ]);
    }
}
