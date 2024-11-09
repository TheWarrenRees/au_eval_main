<?php

namespace Database\Seeders;

use App\Models\PeerResponseItemModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeerResponseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $range_questionnaire_id = range(1, 20);
        $total_responses = 90;  

        for ($response_id = 1; $response_id <= $total_responses; $response_id++) {
            foreach ($range_questionnaire_id as $questionnaire_id) {
                $response_item = [
                    'response_id' => $response_id,
                    'questionnaire_id' => $questionnaire_id,
                    'response_rating' => rand(1, 4),  
                ];
                PeerResponseItemModel::updateOrCreate([
                    'response_id' => $response_id,
                    'questionnaire_id' => $questionnaire_id], $response_item);
            }
        }
    }
}
