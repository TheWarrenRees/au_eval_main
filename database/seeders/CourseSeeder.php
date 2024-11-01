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
            [
                'id' => '401',
                'department_id' => '301',
                'code' => 'BSIT',
                'name' => 'Bachelor of Science in Information Technology',
            ],
            [
                'id' => '402',
                'department_id' => '301',
                'code' => 'BSCS',
                'name' => 'Bachelor of Science in Computer Science',
            ],
            [
                'id' => '403',
                'department_id' => '303',
                'code' => 'BSN',
                'name' => 'Bachelor of Science in Nursing',
            ],
            [
                'id' => '404',
                'department_id' => '302',
                'code' => 'BSBA',
                'name' => 'Bachelor of Science in Business Administration',
            ],
            [
                'id' => '405',
                'department_id' => '302',
                'code' => 'BSAIS',
                'name' => 'Bachelor of Science in Accounting Information System'
            ],
            [
                'id' => '406',
                'department_id' => '304',
                'code' => 'BSHM',
                'name' => 'Bachelor of Science in Hospitality Management'
            ],
            [
                'id' => '407',
                'department_id' => '304',
                'code' => 'BSTM',
                'name' => 'Bachelor of Science in Tourism Management'
            ],
            [
                'id' => '408',
                'department_id' => '306',
                'code' => 'BSC',
                'name' => 'Bachelor of Science in Criminology'
            ],
            [
                'id' => '409',
                'department_id' => '305',
                'code' => 'BAEL',
                'name' => 'Bachelor of Arts in English Language'
            ],
            [
                'id' => '410',
                'department_id' => '305',
                'code' => 'BAP',
                'name' => 'Bachelor of Arts in Psychology'
            ],
            [
                'id' => '411',
                'department_id' => '305',
                'code' => 'BAPS',
                'name' => 'Bachelor of Arts in Political Science'
            ],
            [
                'id' => '412',
                'department_id' => '307',
                'code' => 'BEEMGE',
                'name' => 'Bachelor of Elementary Education Major in General Education'
            ],
            [
                'id' => '413',
                'department_id' => '307',
                'code' => 'BEE',
                'name' => 'Bachelor of Elementary Education'
            ],
            [
                'id' => '414',
                'department_id' => '307',
                'code' => 'BPE',
                'name' => 'Bachelor of Physical Education'
            ],
            [
                'id' => '415',
                'department_id' => '307',
                'code' => 'BSE',
                'name' => 'Bachelor of Secondary Education'
            ],
            [
                'id' => '416',
                'department_id' => '308',
                'code' => 'DM',
                'name' => 'Diploma in Midwifery'
            ],
        ];
        foreach ($samplecourse as $course) {
            CourseModel::updateOrCreate(['id' => $course['id']], $course);
        }
    }
}
