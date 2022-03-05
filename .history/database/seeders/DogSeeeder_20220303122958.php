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
        DB::table('Dogs')->insert([
            'dog_name' => Str::random(10),
            'dog_breed' => Str::random(10).'@gmail.com'
        ]);
        \App\Models\Dog::create([
            'dog_name' => 'Sarikas',
            'dog_breed' => 'Terjeras'
        ]);

    }
}
