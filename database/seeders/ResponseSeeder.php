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
        $responses = [];

        $template_faculty_map = [
            1 => 1, 2 => 1, 3 => 1, // Subject 1-3 for Prof 1
            4 => 2, 5 => 2, 6 => 2, // Subject 4-6 for Prof 2
        ];

        // Starting user_id for template 1-3 (Prof 1)
        $user_id_prof_1 = 1;
        // Starting user_id for template 4-6 (Prof 2)
        $user_id_prof_2 = 41;

        $comments = [
            //Open Ended Comments
            "It's refreshing to have a professor who only reads from the slides!",
            "Nothing like the professor's monotone voice to keep me awake during lectures!",
            "So glad the professor made office hours at 7 AM. Perfect for us night owls!",
            "The course was so well-organized—if you enjoy guessing what to study!",

            //Sentiment-Labeled Comments
                //Positive
            "The professor was approachable and willing to clarify difficult concepts.",
            "Class discussions were engaging.",
                //Neutral
            "The professor provided the necessary material and stuck to the syllabus.",
            "The course materials were available on time, but nothing extra was added.",
                //Negative
            "The professor rarely answeres questions clearly.",
            "Lectures felt unorganized."
        ];

        foreach ($template_faculty_map as $template_id => $faculty_id) {

            $user_id = ($faculty_id == 1) ? $user_id_prof_1 : $user_id_prof_2;

            for ($i = 0; $i < 40; $i++) {
                $responses[] = [
                    'user_id' => $user_id++,  
                    'evaluation_id' => 1,
                    'template_id' => $template_id,  
                    'faculty_id' => $faculty_id,  
                    'semester' => 1,
                    'comment' => $comments[array_rand($comments)],
                    'start_time' => Carbon::now()->addMinutes(rand(0, 59))->format('H:i'), // Random start time
                    'end_time' => Carbon::now()->addMinutes(rand(60, 119))->format('H:i'), // Random end time
                ];
            }
            $faculty_id++;

            if ($faculty_id == 2) {
                $user_id_prof_2 = $user_id; 
            }
        }

        foreach ($responses as $response) {
            ResponseModel::updateOrCreate([
                'user_id' => $response['user_id'],
                'evaluation_id' => $response['evaluation_id'],
                'template_id' => $response['template_id'],
                'faculty_id' => $response['faculty_id'],
                'comment' => $response['comment'],
            ], $response);
        }
    }
}
