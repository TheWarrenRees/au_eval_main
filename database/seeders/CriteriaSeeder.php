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
            [
                'id' => '1',
                'name' => 'Planned Instructions',
            ],
            [
                'id' => '2',
                'name' => 'Lesson Implementation',
            ],
            [
                'id' => '3',
                'name' => 'Motivates Students',
            ],
            [
                'id' => '4',
                'name' => 'Communicates Lesson',
            ],
            [
                'id' => '5',
                'name' => 'Demostrate Knowledge on Lessons',
            ],
            [
                'id' => '6',
                'name' => 'Sets High Expectations to Enhance Capabilities of Students',
            ],
            [
                'id' => '7',
                'name' => 'Maximizes Time on Task',
            ],
            [
                'id' => '8',
                'name' => 'Integrates Materials',
            ],
            [
                'id' => '9',
                'name' => 'Plan and Uses Evaluative Activities',
            ],
            [
                'id' => '10',
                'name' => 'Provides Specific Evaluative Feedback',
            ],
        ];
        foreach ($samplecriteria as $criteria){
            CriteriaModel::updateOrCreate(['id' => $criteria['id']], $criteria);
        }
    }
}