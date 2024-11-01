<?php

namespace Database\Seeders;

use App\Models\FacultyModel;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $samplefaculty = [
            [
                'id' => '101',
                'department_id' => '301',
                'employee_number' => '21-00650',
                'firstname' => 'Daryll',
                'lastname' => 'Cruz',
                'middlename' => 'Dela Cruz',
                'email' => 'daryllcruz32603@gmail.com',
                'image' => NULL,
                'gender' => '1',
                'username' => 'daryllcruz32603',
                'password' => bcrypt('password'),
            ],
            [
                'id' => '102',
                'department_id' => '301',
                'employee_number' => '21-00306',
                'firstname' => 'Lorenz Andrei',
                'lastname' => 'Magante',
                'middlename' => 'Cruz',
                'email' => 'rerenzmagante@gmail.com',
                'image' => NULL,
                'gender' => '1',
                'username' => 'rerenz',
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($samplefaculty as $faculty){
            FacultyModel::updateOrCreate(['id' => $faculty['id']], $faculty);
        }
    }
}
