<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notes;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notes::create([
            'note_name' => 'Sumoketi uz nuoma',
            'note_text' => 'Nepamirsti susimoketi uz nuoma.'
        ]);
        Notes::create([
            'note_name' => 'Palikti raktai',
            'note_text' => 'Nepamirsti pasiimti raktus is budetojos.'
        ]);
    }
}
