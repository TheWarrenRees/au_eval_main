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
            ['branch_id' => 1, 'name' => 'School of Information Technology'],
            ['branch_id' => 1, 'name' => 'School of Business and Administration'],
        ];

        foreach ($sampledepartment as $department){
            DepartmentModel::updateOrCreate(['branch_id' => $department['branch_id'], 'name' => $department['name']], $department);
        }
    }
}
