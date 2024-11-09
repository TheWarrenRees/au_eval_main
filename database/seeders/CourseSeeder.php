<?php

namespace Database\Seeders;

use App\Models\CourseModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $samplecourse = [
            ['department_id' => '1','name' => 'Bachelor of Science in Information Technology','code' => 'BSIT'],
            ['department_id' => '1','name' => 'Bachelor of Science in Computer Science','code' => 'BSCS'],
        ];
        
        foreach ($samplecourse as $course) {
            CourseModel::updateOrCreate(['name' => $course['name']], $course);
        }
    }
}
