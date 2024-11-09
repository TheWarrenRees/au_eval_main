<?php

namespace Database\Seeders;

use App\Models\BranchModel;
//Illuminate\Database\Console\Seeds\WithoutModelEvents
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void {
        $samplebranches = [
            ['name' => 'Andres Bonifacio Campus (AU Pasig)', 'image' => NULL],
            ['name' => 'Juan Sumulong Campus (AU Legarda)', 'image' => NULL],
        ];
        
        foreach ($samplebranches as $branch) {
            BranchModel::updateOrCreate(['name' => $branch['name']], $branch);
        }
    }
}

