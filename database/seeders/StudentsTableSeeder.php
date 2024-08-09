<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::create([
        'student_name' => 'Alice Johnson',
        'class_teacher_id' => 1,
        'class' => '10A',
        'admission_date' => '2024-08-09',
        'yearly_fees' => 5000.00
        ]);
    }
}
