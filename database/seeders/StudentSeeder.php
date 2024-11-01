<?php

namespace Database\Seeders;

use App\Models\StudentModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplestudent = [
            [
                'id' => '1',
                'course_id' => '401',
                'student_number' => '21-00495',
                'firstname' => 'Danilo',
                'lastname' => 'Chavez',
                'middlename' => 'Cara',
                'gender' => '1',
                'birthday' => '2000-02-29',
                'year_level' => '1',
                'image' => '',
                'email' => 'danilochavezjr29@gmail.com',
                'username' => 'chavz',
                'password' => bcrypt('password'),
            ],
            [
                'id' => '2',
                'course_id' => '401',
                'student_number' => '21-00270',
                'firstname' => 'Vhince Andrei',
                'lastname' => 'Macaraeg',
                'middlename' => 'Arcilla',
                'gender' => '1',
                'birthday' => '2000-02-29',
                'year_level' => '1',
                'image' => '',
                'email' => 'macaraegdrei@gmail.com',
                'username' => 'vdreimac',
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($samplestudent as $student){
            StudentModel::updateOrCreate(['id' => $student['id']], $student);
        }
    }
}