<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tasks;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tasks::create([
            'task_name' => 'ND',
            'task_details' => 'Pasidaryti namu darbus',
            'task_priority' => '10'
        ]);
    
        Tasks::create([
            'task_name' => 'Projektas',
            'task_details' => 'Paruosti projekto dokumentacija',
            'task_priority' => '9'
        ]);
    }
}
