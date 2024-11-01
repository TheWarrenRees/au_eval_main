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
            [
                'id' => '1',
                'questionnaire_id' => '1',
                'criteria_id' => '1',
                'item' => 'Follows prescribed curriculum.',
            ],
            [
                'id' => '2',
                'questionnaire_id' => '1',
                'criteria_id' => '1',
                'item' => 'Uses available materials and resources.',
            ],
            [
                'id' => '3',
                'questionnaire_id' => '1',
                'criteria_id' => '1',
                'item' => 'Chooses activities relevant to the prescribed curriculum.',
            ],
            [
                'id' => '4',
                'questionnaire_id' => '1',
                'criteria_id' => '1',
                'item' => 'Chooses activities appropriate to student abilities.',
            ],
            [
                'id' => '5',
                'questionnaire_id' => '1',
                'criteria_id' => '1',
                'item' => 'Demonstrates flexibility in planning.',
            ],
            [
                'id' => '6',
                'questionnaire_id' => '1',
                'criteria_id' => '2',
                'item' => 'Focuses student attention.',
            ],
            [
                'id' => '7',
                'questionnaire_id' => '1',
                'criteria_id' => '2',
                'item' => 'Informs students of objective of the lesson.',
            ],
            [
                'id' => '8',
                'questionnaire_id' => '1',
                'criteria_id' => '2',
                'item' => 'Relates the lesson to previous and future lessons.',
            ],
            [
                'id' => '9',
                'questionnaire_id' => '1',
                'criteria_id' => '2',
                'item' => 'Presents new material clearly and logically.',
            ],
            [
                'id' => '10',
                'questionnaire_id' => '1',
                'criteria_id' => '2',
                'item' => 'Monitors student learning continuously.',
            ],
            [
                'id' => '11',
                'questionnaire_id' => '1',
                'criteria_id' => '3',
                'item' => 'Shows concern for students.',
            ],
            [
                'id' => '12',
                'questionnaire_id' => '1',
                'criteria_id' => '3',
                'item' => 'Establishes feeling/tone.',
            ],
            [
                'id' => '13',
                'questionnaire_id' => '1',
                'criteria_id' => '3',
                'item' => 'Establishes a level of difficulty which encourages success.',
            ],
            [
                'id' => '14',
                'questionnaire_id' => '1',
                'criteria_id' => '3',
                'item' => 'Uses student interest and background.',
            ],
            [
                'id' => '15',
                'questionnaire_id' => '1',
                'criteria_id' => '3',
                'item' => 'Uses extrinsic/intrinsic rewards.',
            ],
            [
                'id' => '16',
                'questionnaire_id' => '1',
                'criteria_id' => '4',
                'item' => 'Uses variability in presentation.',
            ],
            [
                'id' => '17',
                'questionnaire_id' => '1',
                'criteria_id' => '4',
                'item' => 'Demonstrates enthusiasm, vigor, involvement, and interest in lesson presentation.',
            ],
            [
                'id' => '18',
                'questionnaire_id' => '1',
                'criteria_id' => '4',
                'item' => 'Speaks clearly.',
            ],
            [
                'id' => '19',
                'questionnaire_id' => '1',
                'criteria_id' => '4',
                'item' => 'Puts ideas across logically.',
            ],
            [
                'id' => '20',
                'questionnaire_id' => '1',
                'criteria_id' => '4',
                'item' => 'Praises, elicits, and responds to student questions.',
            ],
            [
                'id' => '21',
                'questionnaire_id' => '1',
                'criteria_id' => '5',
                'item' => 'Teaches accurate and up-to-date information.',
            ],
            [
                'id' => '22',
                'questionnaire_id' => '1',
                'criteria_id' => '5',
                'item' => 'Coordinates learning content with instructional objectives.',
            ],
            [
                'id' => '23',
                'questionnaire_id' => '1',
                'criteria_id' => '5',
                'item' => 'Uses effective examples and illustrations.',
            ],
            [
                'id' => '24',
                'questionnaire_id' => '1',
                'criteria_id' => '5',
                'item' => 'Presents learning content in a logical sequential order.',
            ],
            [
                'id' => '25',
                'questionnaire_id' => '1',
                'criteria_id' => '5',
                'item' => 'Answers student question precisely.',
            ],
            [
                'id' => '26',
                'questionnaire_id' => '1',
                'criteria_id' => '6',
                'item' => 'Communicates expectations of performance to students.',
            ],
            [
                'id' => '27',
                'questionnaire_id' => '1',
                'criteria_id' => '6',
                'item' => 'Uses objective student data to set expectations.',
            ],
            [
                'id' => '28',
                'questionnaire_id' => '1',
                'criteria_id' => '6',
                'item' => 'Uses evaluative feedback to determine level of skill acquisition.',
            ],
            [
                'id' => '29',
                'questionnaire_id' => '1',
                'criteria_id' => '6',
                'item' => 'Encourages participation from all students.',
            ],
            [
                'id' => '30',
                'questionnaire_id' => '1',
                'criteria_id' => '6',
                'item' => 'Uses higher order questioning techniques to promote critical thinking skills.',
            ],
            [
                'id' => '31',
                'questionnaire_id' => '1',
                'criteria_id' => '7',
                'item' => 'Schedules learning time according to policy for the subject area.',
            ],
            [
                'id' => '32',
                'questionnaire_id' => '1',
                'criteria_id' => '7',
                'item' => 'Begins class work promptly.',
            ],
            [
                'id' => '33',
                'questionnaire_id' => '1',
                'criteria_id' => '7',
                'item' => 'Minimizes management time.',
            ],
            [
                'id' => '34',
                'questionnaire_id' => '1',
                'criteria_id' => '7',
                'item' => 'Makes effective use of academic learning time.',
            ],
            [
                'id' => '35',
                'questionnaire_id' => '1',
                'criteria_id' => '7',
                'item' => 'Gives clear and concise directions.',
            ],
            [
                'id' => '36',
                'questionnaire_id' => '1',
                'criteria_id' => '8',
                'item' => 'Demonstrates ability to conduct lessons using a variety of methods.',
            ],
            [
                'id' => '37',
                'questionnaire_id' => '1',
                'criteria_id' => '8',
                'item' => 'Organizes materials, supplies and equipment prior to the lesson.',
            ],
            [
                'id' => '38',
                'questionnaire_id' => '1',
                'criteria_id' => '8',
                'item' => 'Integrates materials and resources smoothly into a lesson.',
            ],
            [
                'id' => '39',
                'questionnaire_id' => '1',
                'criteria_id' => '8',
                'item' => 'Identifies available supplemental resources.',
            ],
            [
                'id' => '40',
                'questionnaire_id' => '1',
                'criteria_id' => '8',
                'item' => 'Enhanced student engagement and collaboration.',
            ],
            [
                'id' => '41',
                'questionnaire_id' => '1',
                'criteria_id' => '9',
                'item' => 'Makes methods of evaluation clear and purposeful to students.',
            ],
            [
                'id' => '42',
                'questionnaire_id' => '1',
                'criteria_id' => '9',
                'item' => 'Monitors student progress through a variety of appropriate evaluation techniques.',
            ],
            [
                'id' => '43',
                'questionnaire_id' => '1',
                'criteria_id' => '9',
                'item' => 'Prepares assignments which reflect the material which has been taught.',
            ],
            [
                'id' => '44',
                'questionnaire_id' => '1',
                'criteria_id' => '9',
                'item' => 'Prepares assignments for the next material to be taught.',
            ],
            [
                'id' => '45',
                'questionnaire_id' => '1',
                'criteria_id' => '9',
                'item' => 'Executes evaluation fairly.',
            ],
            [
                'id' => '46',
                'questionnaire_id' => '1',
                'criteria_id' => '10',
                'item' => 'Provides feedback on assignments as quickly as possible.',
            ],
            [
                'id' => '47',
                'questionnaire_id' => '1',
                'criteria_id' => '10',
                'item' => 'Gives written and oral comments, as well as points or scores.',
            ],
            [
                'id' => '48',
                'questionnaire_id' => '1',
                'criteria_id' => '10',
                'item' => 'Makes opportunities for one-to-one conferences to discuss student progress.',
            ],
            [
                'id' => '49',
                'questionnaire_id' => '1',
                'criteria_id' => '10',
                'item' => 'Interprets test results to students and parents.',
            ],
            [
                'id' => '50',
                'questionnaire_id' => '1',
                'criteria_id' => '10',
                'item' => 'Establish specific, measurable goals for improvement and discuss a plan of action.',
            ],
        ];
        foreach ($samplequestionnaireitem as $questionnaireitem){
            QuestionnaireItemModel::updateOrCreate(['id' => $questionnaireitem['id']], $questionnaireitem);
        }
    }
}
