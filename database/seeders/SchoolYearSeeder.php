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
            [
                'id' => '601',
                'name' => 'School Year 2024-2025 1st Semester',
                'start_year' => '2024',
                'end_year' => '2025',
                'semester' => '1',
                'status' => '1',
            ],
            [
                'id' => '602',
                'name' => 'School Year 2024-2025 2nd Semester',
                'start_year' => '2024',
                'end_year' => '2025',
                'semester' => '2',
                'status' => '1',
            ],
            [
                'id' => '603',
                'name' => 'School Year 2025-2026 1st Semester',
                'start_year' => '2025',
                'end_year' => '2026',
                'semester' => '1',
                'status' => '1',
            ],
            [
                'id' => '604',
                'name' => 'School Year 2025-2026 2nd Semester',
                'start_year' => '2025',
                'end_year' => '2026',
                'semester' => '2',
                'status' => '1',
            ],
        ];
        foreach ($sampleschoolyear as $schoolyear){
            SchoolYearModel::updateOrCreate(['id' => $schoolyear['id']], $schoolyear);
        }
    }
}
