<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {

        $data = [
            'breadcrumbs' => 'Dashboard, Departments',
            'livewire' => [
                'component' => 'faculty.department',
                'data' => [

                ]
            ]
        ];

        $init['response'] = [
            'step' => 1,
        ];

        session($init);

        return view('faculty.template', compact('data'));
    }
}
