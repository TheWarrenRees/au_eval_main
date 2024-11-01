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
            [
                'id' => '701',
                'department_id' => '301',
                'course_id' => '401',
                'subject_id' => '501',
                'year_level' => '1',
                'subject_sem' => '1',
            ]
        ];
        foreach ($samplecurriculumtemplate as $curriculumtemplate){
            CurriculumTemplateModel::updateOrCreate(['id' => $curriculumtemplate['id']], $curriculumtemplate);
        }
    }
}
