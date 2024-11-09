<?php

namespace Database\Seeders;

use App\Models\SchoolYearModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleschoolyear = [
            ['name' => 'School Year 2024-2025 1st Semester', 'start_year' => 2024, 'end_year' => 2025, 'semester' => 1, 'status' => 1],          
        ];
        foreach ($sampleschoolyear as $schoolyear){
            SchoolYearModel::updateOrCreate(['name' => $schoolyear['name']], $schoolyear);
        }
    }
}
