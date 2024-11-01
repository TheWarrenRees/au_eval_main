<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;

class PeerDashboardController extends Controller
{
    public function index() {
    
        $data = [
            'breadcrumbs' => 'Dashboard,Evaluate Faculty',
            'livewire' => [
                'component' => 'faculty.peer-dashboard',
                'data' => []
            ]
        ];

        return view('faculty.template', compact('data'));
    }
}
