<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PeerQuestionnaireItemModel;
use Illuminate\Database\Seeder;

class PeerQuestionnaireItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $samplepeerquestionnaireitem = [
                //Questionnaire 1
                //Criteria 11
                ['questionnaire_id' => '1', 'criteria_id' => '11', 'item' => 'Consistently delivers high-quality work that meets or exceeds expectations.'],
                ['questionnaire_id' => '1', 'criteria_id' => '11', 'item' => 'Dependable and consistently follows through on assigned tasks and commitments.'],
                //Criteria 12
                ['questionnaire_id' => '1', 'criteria_id' => '12', 'item' => 'Communicates effectively with team members and other departments.'],
                ['questionnaire_id' => '1', 'criteria_id' => '12', 'item' => 'Provides clear, concise, and relevant information when needed.'],
                //Criteria 13
                ['questionnaire_id' => '1',  'criteria_id' => '13', 'item' => 'Works well with others and fosters a collaborative team environment.'],
                ['questionnaire_id' => '1',  'criteria_id' => '13', 'item' => 'Open to sharing ideas and collaborating with colleagues.'],
                //Criteria 14
                ['questionnaire_id' => '1',  'criteria_id' => '14', 'item' => 'Effectively identifies and addresses problems as they arise.'],
                ['questionnaire_id' => '1',  'criteria_id' => '14', 'item' => 'Takes initiative in suggesting or implementing improvements within the team or processes.'],
                //Criteria 15
                ['questionnaire_id' => '1',  'criteria_id' => '15', 'item' => 'Manages their time effectively and prioritizes tasks well.'],
                ['questionnaire_id' => '1',  'criteria_id' => '15', 'item' => 'Stays organized and efficiently handles a variety of tasks and responsibilities.'],
                //Criteria 16
                ['questionnaire_id' => '1', 'criteria_id' => '16', 'item' => 'Adapts well to changes in the workplace or team dynamics.'],
                ['questionnaire_id' => '1', 'criteria_id' => '16', 'item' => 'Remains calm and productive under pressure or when faced with new challenges.'],
                //Criteria 17
                ['questionnaire_id' => '1', 'criteria_id' => '17', 'item' => 'Provides clear direction and guidance to team members when necessary.'],
                ['questionnaire_id' => '1', 'criteria_id' => '17', 'item' => 'Inspires and motivates others to achieve team goals.'],
                //Criteria 18
                ['questionnaire_id' => '1',  'criteria_id' => '18', 'item' => 'Effectively resolves conflicts in a respectful and constructive manner.'],
                ['questionnaire_id' => '1',  'criteria_id' => '18', 'item' => 'Demonstrates patience and empathy when dealing with difficult situations or team members.'],
                //Criteria 19
                ['questionnaire_id' => '1',  'criteria_id' => '19', 'item' => 'Proposes original ideas or solutions to address challenges or improve processes.'],
                ['questionnaire_id' => '1',  'criteria_id' => '19', 'item' => 'Encourages creative thinking and new approaches from team members.'],
                //Criteria 20
                ['questionnaire_id' => '1',  'criteria_id' => '20', 'item' => 'Actively seeks opportunities to develop new skills or knowledge.'],
                ['questionnaire_id' => '1',  'criteria_id' => '20', 'item' => 'Open to participating in training or development programs to improve performance.'],
            ];

            foreach ($samplepeerquestionnaireitem as $peerquestionnaireitem){
                PeerQuestionnaireItemModel::updateOrCreate(['questionnaire_id' => $peerquestionnaireitem['questionnaire_id'],
                    'criteria_id' => $peerquestionnaireitem['criteria_id'],
                    'item' => $peerquestionnaireitem['item']], $peerquestionnaireitem);
            }
        }
    }
}
