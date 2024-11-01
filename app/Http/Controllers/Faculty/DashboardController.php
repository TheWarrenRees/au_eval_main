<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {

        $data = [
            'breadcrumbs' => 'Dashboard,Student Reviews',
            'livewire' => [
                'component' => 'faculty.dashboard',
                'data' => []
            ]
        ];

        return view('faculty.template', compact('data'));
    }
}
