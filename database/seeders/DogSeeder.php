<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dog;

class DogSeeder extends Seeder
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
