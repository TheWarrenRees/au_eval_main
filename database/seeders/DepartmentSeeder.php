<?php

namespace Database\Seeders;

use App\Models\DepartmentModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampledepartment = [
            [
                'id' => '301',
                'branch_id' => '202',
                'name' => 'School of Information Technology',
            ],
            [
                'id' => '302',
                'branch_id' => '202',
                'name' => 'School of Business and Administration',
            ],
            [
                'id' => '303',
                'branch_id' => '202',
                'name' => 'College of Nursing',
            ],
            [
                'id' => '304',
                'branch_id' => '202',
                'name' => 'School of Hospitality and Tourism Management',
            ],
            [
                'id' => '305',
                'branch_id' => '202',
                'name' => 'College of Arts and Sciences',
            ],
            [
                'id' => '306',
                'branch_id' => '202',
                'name' => 'College of Criminal Justice',
            ],
            [
                'id' => '307',
                'branch_id' => '202',
                'name' => 'School of Education',
            ],
            [
                'id' => '308',
                'branch_id' => '202',
                'name' => 'School of Midwifery',
            ],
        ];
        foreach ($sampledepartment as $department){
            DepartmentModel::updateOrCreate(['id' => $department['id']], $department);
        }
    }
}
