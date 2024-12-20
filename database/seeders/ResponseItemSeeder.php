<?php

namespace Database\Seeders;

use App\Models\ResponseItemModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $range_questionnaire_id = range(1, 20);
        $total_responses = 240;  

        for ($response_id = 1; $response_id <= $total_responses; $response_id++) {
            foreach ($range_questionnaire_id as $questionnaire_id) {
                $response_item = [
                    'response_id' => $response_id,
                    'questionnaire_id' => $questionnaire_id,
                    'response_rating' => rand(1, 4),  
                ];
                ResponseItemModel::updateOrCreate([
                    'response_id' => $response_id,
                    'questionnaire_id' => $questionnaire_id], $response_item);
            }
        }
    }
}
