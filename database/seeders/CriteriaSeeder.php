<?php

namespace Database\Seeders;

use App\Models\CriteriaModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void {
        $samplecriteria = [
            //Student Criteria
            ['name' => 'Planned Instructions'], //id = 1
            ['name' => 'Lesson Implementation'], //id = 2
            ['name' => 'Motivates Students'], //id = 3
            ['name' => 'Communicates Lesson'], //id = 4
            ['name' => 'Demostrate Knowledge on Lessons'], //id = 5
            ['name' => 'Sets High Expectations to Enhance Capabilities of Students'], //id = 6
            ['name' => 'Maximizes Time on Task'], //id = 7
            ['name' => 'Integrates Materials'], //id = 8
            ['name' => 'Plan and Uses Evaluative Activities'], //id = 9
            ['name' => 'Provides Specific Evaluative Feedback'], //id = 10

            //Faculty Criteria
            ['name' => 'Work Quality and Reliability'], //id = 11
            ['name' => 'Communication Skills'], //id = 12
            ['name' => 'Team Collaboration'], //id = 13
            ['name' => 'Problem Solving and Initiative'], //id = 14
            ['name' => 'Time Management and Organization'], //id = 15
            ['name' => 'Adaptability and Flexibility'], //id = 16
            ['name' => 'Leadership and Influence'], //id = 17
            ['name' => 'Conflict Resolution and Diplomacy'], //id = 18
            ['name' => 'Creativity and Innovation'], //id = 19
            ['name' => 'Self-Development and Continuous Learning'], //id = 20
        ];
        foreach ($samplecriteria as $criteria){
            CriteriaModel::updateOrCreate(['name' => $criteria['name']], $criteria);
        }
    }
}