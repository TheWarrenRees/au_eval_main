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
        $samplepeerquestionnaire = [
            ['school_year_id' => '1', 'name' => '1st Sem End Peer Evaluation 2024'],
        ];

        foreach ($samplepeerquestionnaire as $peerquestionnaire){
            PeerQuestionnaireModel::updateOrCreate(['school_year_id' => $peerquestionnaire['school_year_id']], $peerquestionnaire);
        }      
    }
}
