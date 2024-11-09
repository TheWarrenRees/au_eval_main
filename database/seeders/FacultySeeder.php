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
                'department_id' => 1,
                'employee_number' => '20-00001',
                'firstname' => 'Juan',
                'lastname' => 'Cruz',
                'middlename' => 'Dela Cruz',
                'email' => 'juancruz@gmail.com',
                'image' => NULL,
                'gender' => 1,
                'username' => 'juancruz',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00002',
                'firstname' => 'Paul',
                'lastname' => 'Magante',
                'middlename' => 'Cruz',
                'email' => 'paulmagante@gmail.com',
                'image' => NULL,
                'gender' => 1,
                'username' => 'paulmagante',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00003',
                'firstname' => 'Maria',
                'lastname' => 'Gonzales',
                'middlename' => 'Santos',
                'email' => 'mariagonzales@gmail.com',
                'image' => NULL,
                'gender' => 2,
                'username' => 'mariagonzales',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00004',
                'firstname' => 'Carlos',
                'lastname' => 'Lopez',
                'middlename' => 'Reyes',
                'email' => 'carloslopez@gmail.com',
                'image' => NULL,
                'gender' => 1,
                'username' => 'carloslopez',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00005',
                'firstname' => 'Anna',
                'lastname' => 'Perez',
                'middlename' => 'Vega',
                'email' => 'annaperez@gmail.com',
                'image' => NULL,
                'gender' => 2,
                'username' => 'annaperez',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00006',
                'firstname' => 'John',
                'lastname' => 'Dela Cruz',
                'middlename' => 'Santiago',
                'email' => 'johndelacruz@gmail.com',
                'image' => NULL,
                'gender' => 1,
                'username' => 'johndelacruz',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00007',
                'firstname' => 'Sofia',
                'lastname' => 'Garcia',
                'middlename' => 'Moreno',
                'email' => 'sofiagarcia@gmail.com',
                'image' => NULL,
                'gender' => 2,
                'username' => 'sofiagarcia',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00008',
                'firstname' => 'Luis',
                'lastname' => 'Martinez',
                'middlename' => 'Fernandez',
                'email' => 'luismartinez@gmail.com',
                'image' => NULL,
                'gender' => 1,
                'username' => 'luismartinez',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00009',
                'firstname' => 'Isabel',
                'lastname' => 'Romero',
                'middlename' => 'Jimenez',
                'email' => 'isabelromero@gmail.com',
                'image' => NULL,
                'gender' => 2,
                'username' => 'isabelromero',
                'password' => bcrypt('password'),
            ],
            [
                'department_id' => 1,
                'employee_number' => '20-00010',
                'firstname' => 'Antonio',
                'lastname' => 'Suarez',
                'middlename' => 'Mendoza',
                'email' => 'antoniosuarez@gmail.com',
                'image' => NULL,
                'gender' => 1,
                'username' => 'antoniosuarez',
                'password' => bcrypt('password'),
            ]         
        ];
        
        foreach ($samplefaculty as $faculty){
            FacultyModel::updateOrCreate(['email' => $faculty['email'], 'username' => $faculty['username']], $faculty);
        }
    }
}
