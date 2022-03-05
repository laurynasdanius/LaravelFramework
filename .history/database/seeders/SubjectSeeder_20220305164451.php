<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('dogs')->insert([
        //     'dog_name' => 'Sarikas',
        //     'dog_breed' => 'Terjeras'
        // ]);

        Dog::create([
            'dog_name' => 'Sarikas',
            'dog_breed' => 'Terjeras'
        ]);

    }
}
