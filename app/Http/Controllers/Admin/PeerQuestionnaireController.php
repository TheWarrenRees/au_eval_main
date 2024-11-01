<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

use App\Models\PeerQuestionnaireModel;
use App\Models\SchoolYearModel;

class PeerQuestionnaireController extends Controller
{
    public function index(Request $request) {

        $action = $request->input('action');
        $slug = $request->input('slug');

        if(in_array($action, ['update', 'delete'])) {
            $data = PeerQuestionnaireModel::where('slug', $slug);
            if(!$data->exists()) {
                return redirect()->route('admin.programs.peer-questionnaire');
            }
        }

        $school_year = [];

        $dirty_sy = SchoolYearModel::all();

        // dd($dirty_sy);

        foreach($dirty_sy as $year) {
            $school_year[] = (object) [
                'id' => $year->id,
                'name' => 'SY: ' . $year->start_year . ' - ' . $year->end_year . ' | ' .to_ordinal($year->semester,' semester ')  .'('.$year->name.')' ,
            ];
        }
        
        // dd(vars: $school_year);

        $data = [
            'breadcrumbs' => 'Dashboard,programs,peer questionnaire',
            'livewire' => [
                'component' => 'admin.peer-questionnaire',
                'data' => [
                    'lazy' => true,
                    'form' => [
                        'slug' => $slug,
                        'action' => $action,
                        'index' => [
                            'title' => 'All Peer Questionnaires',
                            'subtitle' => 'List of all peer questionnaires created.'
                        ],
                        'create' => [
                            'title' => 'Create Peer Questionnaire',
                            'subtitle' => 'Create or add new Peer questionnaire.',
                            'data' => [
                                'school_year_id' => [
                                    'label' => 'School Year',
                                    'type' => 'select',
                                    'options' => [
                                        'is_from_db' => true,
                                        'group' => '',
                                        'data' => $school_year,
                                        'no_data' => 'Create school year first'
                                    ],
                                    'required' => true,
                                    'disabled' => false,
                                    'css' => 'col-span-12'
                                ],
                                'name' => [
                                    'label' => 'Name',
                                    'type' => 'text',
                                    'placeholder' => 'Write something...',
                                    'required' => true,
                                    'disabled' => false,
                                    'css' => 'col-span-12'
                                ]
                            ]
                        ],
                        'update' => [
                            'title' => 'Update Peer Questionnaire',
                            'subtitle' => 'Update Peer questionnaire.',
                            'data' => [
                                'school_year_id' => [
                                    'label' => 'School Year',
                                    'type' => 'select',
                                    'options' => [
                                        'is_from_db' => true,
                                        'group' => '',
                                        'data' => $school_year,
                                        'no_data' => 'Create school year first'
                                    ],
                                    'required' => true,
                                    'disabled' => false,
                                    'css' => 'col-span-12'
                                ],
                                'name' => [
                                    'label' => 'Name',
                                    'type' => 'text',
                                    'placeholder' => 'Write something...',
                                    'required' => true,
                                    'disabled' => false,
                                    'css' => 'col-span-12'
                                ]
                            ]
                        ],
                        'delete' => [
                            'title' => 'Delete Peer Questionnaire',
                            'subtitle' => 'Delete Peer questionnaire.',
                            'data' => [
                                'school_year_id' => [
                                    'label' => 'School Year',
                                    'type' => 'select',
                                    'options' => [
                                        'is_from_db' => true,
                                        'group' => '',
                                        'data' => $school_year,
                                        'no_data' => 'Create school year first'
                                    ],
                                    'required' => false,
                                    'disabled' => true,
                                    'css' => 'col-span-12'
                                ],
                                'name' => [
                                    'label' => 'Name',
                                    'type' => 'text',
                                    'placeholder' => 'Write something...',
                                    'required' => false,
                                    'disabled' => true,
                                    'css' => 'col-span-12'
                                ]
                            ]
                        ],
                    ],
                ]
            ]
        ];

        return view('template', compact('data'));
}
}