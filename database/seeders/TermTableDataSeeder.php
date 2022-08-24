<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Terms;

class TermTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Terms::create([
            'termname' => 'One',
        ]);

        Terms::create([
            'termname' => 'Two',
        ]);

        Terms::create([
            'termname' => 'Three',
        ]);
    }
}
