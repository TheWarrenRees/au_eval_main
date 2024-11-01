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
            $samplequestionnaireitem = [
                [
                    'id' => '1',
                    'questionnaire_id' => '1',
                    'criteria_id' => '1',
                    'item' => 'Peer Question 1',
                ]
            ];
            foreach ($samplequestionnaireitem as $questionnaireitem){
                PeerQuestionnaireItemModel::updateOrCreate(['id' => $questionnaireitem['id']], $questionnaireitem);
            }
        }
    }
}
