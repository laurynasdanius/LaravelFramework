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
        // DB::table('dogs')->insert([
        //     'dog_name' => 'Sarikas',
        //     'dog_breed' => 'Terjeras'
        // ]);

        Subject::create([
            'dog_name' => 'Sarikas',
            'dog_breed' => 'Terjeras'
        ]);

    }
}
