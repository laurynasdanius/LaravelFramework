<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DogSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App/Models/Movie::create([
            'dog_name' => 'A new hope',
            'dog_breed' => 'A new hope'
        ]);

        App/Movie::create([
            'name' => 'A new hope',
            'year' => 'A new hope'
        ]);
    }
}
