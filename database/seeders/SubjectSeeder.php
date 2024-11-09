<?php

namespace Database\Seeders;

use App\Models\SubjectModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplesubject = [
            ['course_id' => '1', 'name' => 'Mathematics in Modern World', 'code' => 'GCAS 05'], //id = 1
            ['course_id' => '1', 'name' => 'Purposive Communication', 'code' => 'GCAS 06'], //id = 2
            ['course_id' => '1', 'name' => 'Science, Technology, and Society', 'code' => 'GCAS 07'], //id = 3
            ['course_id' => '1', 'name' => 'PE-1 Movement Enhancement', 'code' => 'GCAS 15'], //id = 4
            ['course_id' => '1', 'name' => 'NSTP 1', 'code' => 'GCAS 19'], //id = 5
            ['course_id' => '1', 'name' => 'Introduction to Computing', 'code' => 'ITC 110'], //id = 6
            ['course_id' => '1', 'name' => 'Computer Programming 1', 'code' => 'ITC 111'], //id = 7
            ['course_id' => '1', 'name' => 'Intro to Graphics and Design', 'code' => 'ITC 112'], //id = 8
            ['course_id' => '1', 'name' => 'Art Appreciation', 'code' => 'GCAS 01'], //id = 9
            ['course_id' => '1', 'name' => 'Readings in Philippine History', 'code' => 'GCAS 04'], //id = 10
            ['course_id' => '1', 'name' => 'PE-2 Fitness Exercises', 'code' => 'GCAS 16'], //id = 11
            ['course_id' => '1', 'name' => 'NSTP 2', 'code' => 'GCAS 20'], //id = 12
            ['course_id' => '1', 'name' => 'Discrete Mathematics', 'code' => 'IT 210'], //id = 13
            ['course_id' => '1', 'name' => 'Intro to Human Interaction', 'code' => 'IT 211'], //id = 14
            ['course_id' => '1', 'name' => 'Computer Programming 2', 'code' => 'ITC 120'], //id = 15
            ['course_id' => '1', 'name' => 'Operating System', 'code' => 'ITC 121'], //id = 16
            ['course_id' => '1', 'name' => 'Intro to Web Design', 'code' => 'ITC 122'], //id = 17
        ];

        foreach ($samplesubject as $subject){
             SubjectModel::updateOrCreate(['course_id' => $subject['course_id'], 
            'name' => $subject['name'], 
            'code' => $subject['code']], $subject);
        }
    }
}
