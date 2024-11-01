<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Livewire\Admin\PeerReviews;
use App\Models\SchoolYearModel;
use Illuminate\Http\Request;

class PeerEvaluationResultController extends Controller
{
    public function index(Request $request) {

        $id = $request->input('id');

        $is_exists = SchoolYearModel::where('id', $id)->exists();

        if(!$is_exists) {
            return redirect()->route('admin.programs.peer-reviews');
        }

        $action = $request->input('action');
        $faculty = $request->input('faculty');
        $template = $request->input('template');
        $subject = $request->input('subject');//eto
        $department = $request->input('department');//et
        $tab = $request->input('tab');

        $data = [
            'breadcrumbs' => 'Dashboard,programs,peer evaluation results',
            'livewire' => [
                'component' => 'admin.peer-evaluation-result',
                'data' => [
                    'lazy' => true,
                    'form' => [
                        'id' => $id,
                        'action' => $action,
                        'faculty' => $faculty,
                        'template' => $template,
                        //'Schoolyear' => $template,
                        'subject' => $subject,
                        'department' => $department,
                        'tab' => $tab,
                        'index' => [
                            'title' => 'Peer Evaluation Results',
                            'subtitle' => 'List of all Peer evaluation results.'
                        ]
                    ],
                ]

            ]
        ];

        return view('template', compact('data'));
    }
}
