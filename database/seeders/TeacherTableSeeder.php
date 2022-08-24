<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'fullname' => 'katie',
            'age' => 35,
            'gender' => 'f'
        ]);

        Teacher::create([
            'fullname' => 'jimmy carter',
            'age' => 25,
            'gender' => 'f'
        ]);

        Teacher::create([
            'fullname' => 'johny',
            'age' => 45,
            'gender' => 'f'
        ]);
    }
}
