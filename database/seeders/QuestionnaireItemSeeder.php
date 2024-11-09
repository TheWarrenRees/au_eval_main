<?php

namespace Database\Seeders;

use App\Models\QuestionnaireItemModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionnaireItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplequestionnaireitem = [
            //Questionnaire 1
            //Criteria 1
            ['questionnaire_id' => '1', 'criteria_id' => '1', 'item' => 'Follows prescribed curriculum.'],
            ['questionnaire_id' => '1', 'criteria_id' => '1', 'item' => 'Uses available materials and resources.'],
            //Criteria 2
            ['questionnaire_id' => '1', 'criteria_id' => '2', 'item' => 'Focuses student attention.'],
            ['questionnaire_id' => '1', 'criteria_id' => '2', 'item' => 'Informs students of objective of the lesson.'],
            //Criteria 3
            ['questionnaire_id' => '1',  'criteria_id' => '3', 'item' => 'Shows concern for students.'],
            ['questionnaire_id' => '1',  'criteria_id' => '3', 'item' => 'Establishes feeling/tone.'],
            //Criteria 4
            ['questionnaire_id' => '1',  'criteria_id' => '4', 'item' => 'Uses variability in presentation.'],
            ['questionnaire_id' => '1',  'criteria_id' => '4', 'item' => 'Demonstrates enthusiasm, vigor, involvement, and interest in lesson presentation.'],
            //Criteria 5
            ['questionnaire_id' => '1',  'criteria_id' => '5', 'item' => 'Teaches accurate and up-to-date information.'],
            ['questionnaire_id' => '1',  'criteria_id' => '5', 'item' => 'Coordinates learning content with instructional objectives.'],
            //Criteria 6
            ['questionnaire_id' => '1',  'criteria_id' => '6', 'item' => 'Communicates expectations of performance to students.'],
            ['questionnaire_id' => '1',  'criteria_id' => '6', 'item' => 'Uses objective student data to set expectations.'],
            //Criteria 7
            ['questionnaire_id' => '1',  'criteria_id' => '7', 'item' => 'Schedules learning time according to policy for the subject area.'],
            ['questionnaire_id' => '1',  'criteria_id' => '7', 'item' => 'Begins class work promptly.'],
            //Criteria 8
            ['questionnaire_id' => '1',  'criteria_id' => '8', 'item' => 'Demonstrates ability to conduct lessons using a variety of methods.'],
            ['questionnaire_id' => '1',  'criteria_id' => '8', 'item' => 'Organizes materials, supplies and equipment prior to the lesson.'],
            //Criteria 9
            ['questionnaire_id' => '1',  'criteria_id' => '9', 'item' => 'Makes methods of evaluation clear and purposeful to students.'],
            ['questionnaire_id' => '1',  'criteria_id' => '9', 'item' => 'Monitors student progress through a variety of appropriate evaluation techniques.'],
            //Criteria 10
            ['questionnaire_id' => '1',  'criteria_id' => '10', 'item' => 'Provides feedback on assignments as quickly as possible.'],
            ['questionnaire_id' => '1',  'criteria_id' => '10', 'item' => 'Gives written and oral comments, as well as points or scores.'],
        ];

        foreach ($samplequestionnaireitem as $questionnaireitem){
            QuestionnaireItemModel::updateOrCreate(['questionnaire_id' => $questionnaireitem['questionnaire_id'],
                    'criteria_id' => $questionnaireitem['criteria_id'],
                    'item' => $questionnaireitem['item']], $questionnaireitem);
        }
    }
}
