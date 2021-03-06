<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            DogSeeder::class
        ]);
        $this->call([
            StudentSeeder::class
        ]);
        $this->call([
            SubjectSeeder::class
        ]);
        $this->call([
            TasksSeeder::class
        ]);
        $this->call([
            NotesSeeder::class
        ]);
        
    }
}
