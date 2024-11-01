<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'AUEVAL SuperAdmin',
            'email' => 'super@admin.com',
            'username' => 'superadmin01',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        User::factory()->create([
            'name' => 'AUEVAL MiniAdmin',
            'email' => 'admin@admin.com',
            'username' => 'admin00',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Apolinario Mabini',
            'email' => 'admin1@admin.com',
            'username' => 'admin01',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'assigned_branch' => 201
        ]);

        User::factory()->create([
            'name' => 'Andres Bonifacio',
            'email' => 'admin2@admin.com',
            'username' => 'admin02',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'assigned_branch' => 202
        ]);

        

        $this->call([
            BranchSeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,
            CriteriaSeeder::class,
            FacultySeeder::class,
            SchoolYearSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            QuestionnaireSeeder::class,
            QuestionnaireItemSeeder::class,
            ResponseSeeder::class,
            ResponseItemSeeder::class,
            CurriculumTemplateSeeder::class,
            FacultyTemplateSeeder::class,
        ]);
    }
}
