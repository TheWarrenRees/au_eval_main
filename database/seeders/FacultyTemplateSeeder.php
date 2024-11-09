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
            //1st Year Prof and Subject

            //Subject 1
            ['faculty_id' => 1, 'template_id' => 1], //id = 1
            ['faculty_id' => 2, 'template_id' => 1], //id = 2
            ['faculty_id' => 3, 'template_id' => 1], //id = 3

            //Subject 2
            ['faculty_id' => 1, 'template_id' => 2], //id = 4
            ['faculty_id' => 2, 'template_id' => 2], //id = 5
            ['faculty_id' => 3, 'template_id' => 2], //id = 6

            //Subject 3
            ['faculty_id' => 1, 'template_id' => 3], //id = 7
            ['faculty_id' => 2, 'template_id' => 3], //id = 8
            ['faculty_id' => 3, 'template_id' => 3], //id = 9
            

            //2nd Year Same Prof but Dif Subject

            //Subject 4
            ['faculty_id' => 1, 'template_id' => 4], //id = 10
            ['faculty_id' => 2, 'template_id' => 4], //id = 11
            ['faculty_id' => 3, 'template_id' => 4], //id = 12

            //Subject 5
            ['faculty_id' => 1, 'template_id' => 5], //id = 13
            ['faculty_id' => 2, 'template_id' => 5], //id = 14
            ['faculty_id' => 3, 'template_id' => 5], //id = 15

            //Subject 6
            ['faculty_id' => 1, 'template_id' => 6], //id = 16
            ['faculty_id' => 2, 'template_id' => 6], //id = 17
            ['faculty_id' => 3, 'template_id' => 6], //id = 18

            //Subject 1 + 7 Profs
            ['faculty_id' => 4, 'template_id' => 1], //id = 19
            ['faculty_id' => 5, 'template_id' => 1], //id = 20
            ['faculty_id' => 6, 'template_id' => 1], //id = 21
            ['faculty_id' => 7, 'template_id' => 1], //id = 22
            ['faculty_id' => 8, 'template_id' => 1], //id = 23
            ['faculty_id' => 9, 'template_id' => 1], //id = 24
            ['faculty_id' => 10, 'template_id' => 1], //id = 25

            //Subject 2 + 7 Profs
            ['faculty_id' => 4, 'template_id' => 2], //id = 26
            ['faculty_id' => 5, 'template_id' => 2], //id = 27
            ['faculty_id' => 6, 'template_id' => 2], //id = 28
            ['faculty_id' => 7, 'template_id' => 2], //id = 29
            ['faculty_id' => 8, 'template_id' => 2], //id = 30
            ['faculty_id' => 9, 'template_id' => 2], //id = 31
            ['faculty_id' => 10, 'template_id' => 2], //id = 32

            //Subject 3 + 7 Profs
            ['faculty_id' => 4, 'template_id' => 3], //id = 33
            ['faculty_id' => 5, 'template_id' => 3], //id = 34
            ['faculty_id' => 6, 'template_id' => 3], //id = 35
            ['faculty_id' => 7, 'template_id' => 3], //id = 36
            ['faculty_id' => 8, 'template_id' => 3], //id = 37
            ['faculty_id' => 9, 'template_id' => 3], //id = 38
            ['faculty_id' => 10, 'template_id' => 3], //id = 39

            //Subject 4 + 7 Profs
            ['faculty_id' => 4, 'template_id' => 4], //id = 40
            ['faculty_id' => 5, 'template_id' => 4], //id = 41
            ['faculty_id' => 6, 'template_id' => 4], //id = 42
            ['faculty_id' => 7, 'template_id' => 4], //id = 43
            ['faculty_id' => 8, 'template_id' => 4], //id = 44
            ['faculty_id' => 9, 'template_id' => 4], //id = 45
            ['faculty_id' => 10, 'template_id' => 4], //id = 46

            //Subject 5 + 7 Profs
            ['faculty_id' => 4, 'template_id' => 5], //id = 47
            ['faculty_id' => 5, 'template_id' => 5], //id = 48
            ['faculty_id' => 6, 'template_id' => 5], //id = 49
            ['faculty_id' => 7, 'template_id' => 5], //id = 50
            ['faculty_id' => 8, 'template_id' => 5], //id = 51
            ['faculty_id' => 9, 'template_id' => 5], //id = 52
            ['faculty_id' => 10, 'template_id' => 5], //id = 53

            //Subject 6 + 7 Profs
            ['faculty_id' => 4, 'template_id' => 6], //id = 54
            ['faculty_id' => 5, 'template_id' => 6], //id = 55
            ['faculty_id' => 6, 'template_id' => 6], //id = 56
            ['faculty_id' => 7, 'template_id' => 6], //id = 57
            ['faculty_id' => 8, 'template_id' => 6], //id = 58
            ['faculty_id' => 9, 'template_id' => 6], //id = 59
            ['faculty_id' => 10, 'template_id' => 6], //id = 60
        ];

        foreach ($samplefacultytemplate as $facultytemplate){
            FacultyTemplateModel::updateOrCreate(['faculty_id' => $facultytemplate['faculty_id'],
            'template_id' => $facultytemplate['template_id']], $facultytemplate);
        }
    }
}
