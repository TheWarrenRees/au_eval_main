<?php

namespace Database\Seeders;

use App\Models\BranchModel;
//Illuminate\Database\Console\Seeds\WithoutModelEvents
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void {
        $samplebranches = [
            [
                'id' => '201',
                'name' => 'Apolinario Mabini Campus (AU Pasay)',
                'image' => NULL,
            ],
            [
                'id' => '202',
                'name' => 'Andres Bonifacio Campus (AU Pasig)',
                'image' => NULL,
            ], 
            [
                'id' => '203',
                'name' => 'Elisa Esguerra Campus (AU Malabon)',
                'image' => NULL,
            ],
            [
                'id' => '204',
                'name' => 'Jose Abad Santos Campus (AU Pasay)',
                'image' => NULL,
            ],
            [
                'id' => '205',
                'name' => 'Jose Rizal Campus (AU Malabon)',
                'image' => NULL,
            ],
            [
                'id' => '206',
                'name' => 'Juan Sumulong Campus (AU Legarda)',
                'image' => NULL,
            ],
            [
                'id' => '207',
                'name' => 'Plaridel Campus (AU Mandaluyong)',
                'image' => NULL,
            ],
        ];
        foreach ($samplebranches as $branch) {
            BranchModel::updateOrCreate(['id' => $branch['id']], $branch);
        }
    }
   
}

