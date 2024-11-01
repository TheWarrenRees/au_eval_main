<?php

namespace Database\Seeders;

use App\Models\FacultyTemplateModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultyTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplefacultytemplate = [
            [
                'id' => '801',
                'faculty_id' => '101',
                'template_id' => '701',
            ],
            [
                'id' => '802',
                'faculty_id' => '102',
                'template_id' => '701',
            ],
        ];
        foreach ($samplefacultytemplate as $facultytemplate){
            FacultyTemplateModel::updateOrCreate(['id' => $facultytemplate['id']], $facultytemplate);
        }
    }
}
