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
            ['school_year_id' => '1', 'name' => '1st Sem End Faculty evaluation 2024'],
        ];

        foreach ($samplequestionnaire as $questionnaire){
            QuestionnaireModel::updateOrCreate(['school_year_id' => $questionnaire['school_year_id']], $questionnaire);
        }        
    }
}