<?php

namespace Database\Seeders;

use App\Models\ResponseModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleresponse = [
            [
                'id' => '1',
                'user_id' => '1',
                'evaluation_id' => '601',
                'template_id' => '701',
                'faculty_id' => '101',
                'semester' => '1',
                'comment' => 'Very Good!',
                'start_time' => Carbon::now()->format('H:i'),
                'end_time' => Carbon::now()->format('H:i'),
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'evaluation_id' => '601',
                'template_id' => '701',
                'faculty_id' => '101',
                'semester' => '1',
                'comment' => 'Very Good!',
                'start_time' => Carbon::now()->format('H:i'),
                'end_time' => Carbon::now()->format('H:i'),
            ]
        ];
        foreach ($sampleresponse as $response){
            ResponseModel::updateOrCreate(['id' => $response['id']], $response);
        }
    }
}
