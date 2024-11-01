<?php

namespace Database\Seeders;
use App\Models\PeerQuestionnaireModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeerQuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplequestionnaire = [
            [
                'id' => '1',
                'school_year_id' => '601',
                'name' => 'Peer Eval',
                'slug' => 'PE 2024',
            ],

        ];
        foreach ($samplequestionnaire as $questionnaire){
            PeerQuestionnaireModel::updateOrCreate(['id' => $questionnaire['id']], $questionnaire);
        }        
    }
}
