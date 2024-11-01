<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FacultyModel;

class PeerEvaluateController extends Controller
{
    public function index(Request $request) {

        $departmentId = auth()->guard('faculty')->user()->department_id;
        //$year = auth()->guard('faculty')->user()->year_level; DOUBLE CHECK MO TOH
        $semester = $request->input('semester');
        $template = $request->input('template');
        //$subject_id = $request->input('subject');
        $faculty_id = $request->input('faculty');

        $dirty_faculty = FacultyModel::where('id', $faculty_id)->first();

        $faculty = [
            'id' => $dirty_faculty->id,
            'name' => $dirty_faculty->firstname . ' ' . $dirty_faculty->lastname . ' - ('.$dirty_faculty->departments->name. ')'
        ];

        $step = session('response')['step'];

        $data = [
            'breadcrumbs' => 'Dashboard,evaluate',
            'livewire' => [
                'component' => 'faculty.evaluate',
                'data' => [
                    'lazy' => false,
                    'form' => [
                        'action' => 'save',
                        'save' => [
                            'title' => 'Create Course',
                            'subtitle' => 'Create or add new courses.',
                            'data' => [
                                'faculty_id' => [
                                    'label' => 'Faculty Name',
                                    'type' => 'select',
                                    'options' => [
                                        'is_from_db' => true,
                                        'data' => $faculty,
                                        'group' => 'branches',
                                        'no_data' => 'No Faculty Found'
                                    ],
                                    // 'required' => false,
                                    'disabled' => true,
                                    'css' => 'col-span-12',
                                ],
    
                            ]
                        ],
                    ],
                ]
            ],
        ];

        return view('faculty.template', compact('data'));
    }
}
