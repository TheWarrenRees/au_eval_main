<?php

namespace Database\Seeders;

use App\Models\PeerResponseModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeerResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responses = [];
        $user_ids = range(1, 10); 
 
        $comments = [
            //Open Ended Comments
            "Love the way your feedback is always concise.",
            "You really made the department meeting interesting by bringing up that same topic for the fifth time!",
            "I appreciate how you give constructive feedback—eventually, once I remind you a few times!",
            "Nothing better than receiving your emails at midnight.",

            //Sentiment-Labeled Comments
                //Positive
            "I appreciated the innovative ideas you shared in the last meeting",
            "Your organization skills are a great asset to the team.",
                //Neutral
            "Follows department guidelines closely.",
            "You covered the agenda as expected.",
                //Negative
            "Your feedback was vague and left us unsure how to improve.",
            "It's difficult to get a timely response to emails from you." 
        ];

        foreach ($user_ids as $evaluator_id) {

            $other_users = array_filter($user_ids, fn($id) => $id !== $evaluator_id); 

            foreach ($other_users as $evaluated_id) {
                $responses[] = [
                    'user_id' => $evaluator_id,    
                    'evaluation_id' => 1,          
                    'template_id' => 1,  
                    'faculty_id' => $evaluated_id, 
                    'semester' => 1,               
                    'comment' => $comments[array_rand($comments)], 
                ];
            }
        }

        foreach ($responses as $response) {
            PeerResponseModel::updateOrCreate(
                [
                    'user_id' => $response['user_id'],
                    'evaluation_id' => $response['evaluation_id'],
                    'template_id' => $response['template_id'],
                    'faculty_id' => $response['faculty_id'],
                    'comment' => $response['comment'],
                ],
                $response
            );
        }
    }
}
