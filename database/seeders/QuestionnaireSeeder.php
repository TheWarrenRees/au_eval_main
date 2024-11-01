<?php

namespace Database\Seeders;

use App\Models\QuestionnaireModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
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
                'name' => '1st Sem End Faculty evaluation 2024',
                'slug' => '1st-sem-end-faculty-evaluation-2024',
            ],
        ];
        foreach ($samplequestionnaire as $questionnaire){
            QuestionnaireModel::updateOrCreate(['id' => $questionnaire['id']], $questionnaire);
        }        
    }
}
//nothing