<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\FacultyModel;
use Exception;

class SubjectController extends Controller
{
    public function index() {

        $data = [
            'breadcrumbs' => 'Dashboard,evaluate',
            'livewire' => [
                'component' => 'faculty.subject',
                'data' => [

                ]
            ]
        ];
        
        try{
            $currentUserId = auth()->guard('faculty')->user()->id;
            FacultyModel::with('templates')
            ->where('id', $currentUserId)
            ->has('templates')
            ->get()[0];
        }
        catch(Exception $ex){
            session(['notemplate' => 1]);
        }
        $init['response'] = [
            'step' => 1,
        ];

        session($init);

        return view('faculty.template', compact('data'));
    }
}
