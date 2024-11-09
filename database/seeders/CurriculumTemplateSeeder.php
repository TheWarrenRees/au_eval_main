<?php

namespace Database\Seeders;

use App\Models\CurriculumTemplateModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplecurriculumtemplate = [
            //Subject 1
            [
                'department_id' => '1',
                'course_id' => '1',
                'subject_id' => '1',
                'year_level' => '1',
                'subject_sem' => '1',
            ], 

            //Subject 2
            [
                'department_id' => '1',
                'course_id' => '1',
                'subject_id' => '2',
                'year_level' => '1',
                'subject_sem' => '1',
            ],

            //Subject 3
            [
                'department_id' => '1',
                'course_id' => '1',
                'subject_id' => '3',
                'year_level' => '1',
                'subject_sem' => '1',
            ],

            //Subject 4
            [
                'department_id' => '1',
                'course_id' => '1',
                'subject_id' => '9',
                'year_level' => '2',
                'subject_sem' => '1',
            ],

            //Subject 5
            [
                'department_id' => '1',
                'course_id' => '1',
                'subject_id' => '10',
                'year_level' => '2',
                'subject_sem' => '1',
            ],

            //Subject 6
            [
                'department_id' => '1',
                'course_id' => '1',
                'subject_id' => '11',
                'year_level' => '2',
                'subject_sem' => '1',
            ],
        ];
        
        foreach ($samplecurriculumtemplate as $curriculumtemplate){
            CurriculumTemplateModel::updateOrCreate(['department_id' => $curriculumtemplate['department_id'], 
            'course_id' => $curriculumtemplate['course_id'], 
            'subject_id' => $curriculumtemplate['subject_id'],
            'year_level' => $curriculumtemplate['year_level'],
            'subject_sem' => $curriculumtemplate['subject_sem']], $curriculumtemplate);
        }
    }
}
