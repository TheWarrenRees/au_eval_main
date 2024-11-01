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
            [
                'id' => '501',
                'course_id' => '401',
                'name' => 'Mathematics in Modern World',
                'code' => 'GCAS 05',
            ],
            [
                'id' => '502',
                'course_id' => '401',
                'name' => 'Purposive Communication',
                'code' => 'GCAS 06',
            ],
            [
                'id' => '503',
                'course_id' => '401',
                'name' => 'Science, Technology, and Society',
                'code' => 'GCAS 07',
            ],
            [
                'id' => '504',
                'course_id' => '401',
                'name' => 'PE-1 Movement Enhancement',
                'code' => 'GCAS 15',
            ],
            [
                'id' => '505',
                'course_id' => '401',
                'name' => 'NSTP 1',
                'code' => 'GCAS 19',
            ],
            [
                'id' => '506',
                'course_id' => '401',
                'name' => 'Introduction to Computing',
                'code' => 'ITC 110',
            ],
            [
                'id' => '507',
                'course_id' => '401',
                'name' => 'Computer Programming 1',
                'code' => 'ITC 111',
            ],
            [
                'id' => '508',
                'course_id' => '401',
                'name' => 'Intro to Graphics and Design',
                'code' => 'ITC 112',
            ],
            [
                'id' => '509',
                'course_id' => '401',
                'name' => 'Art Appreciation',
                'code' => 'GCAS 01',
            ],
            [
                'id' => '510',
                'course_id' => '401',
                'name' => 'Readings in Philippine History',
                'code' => 'GCAS 04',
            ],
            [
                'id' => '511',
                'course_id' => '401',
                'name' => 'PE-2 Fitness Exercises',
                'code' => 'GCAS 16',
            ],
            [
                'id' => '512',
                'course_id' => '401',
                'name' => 'NSTP 2',
                'code' => 'GCAS 20',
            ],
            [
                'id' => '513',
                'course_id' => '401',
                'name' => 'Discrete Mathematics',
                'code' => 'IT 210',
            ],
            [
                'id' => '514',
                'course_id' => '401',
                'name' => 'Intro to Human Interaction',
                'code' => 'IT 211',
            ],
            [
                'id' => '515',
                'course_id' => '401',
                'name' => 'Computer Programming 2',
                'code' => 'ITC 120',
            ],
            [
                'id' => '516',
                'course_id' => '401',
                'name' => 'Operating System',
                'code' => 'ITC 121',
            ],
            [
                'id' => '517',
                'course_id' => '401',
                'name' => 'Intro to Web Design',
                'code' => 'ITC 122',
            ],
        ];
        foreach ($samplesubject as $subject){
            SubjectModel::updateOrCreate(['id' => $subject['id']], $subject);
        }
    }
}
