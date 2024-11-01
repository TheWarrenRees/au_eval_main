<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\FacultyModel;


class PeerFacultyController extends Controller
{
    public function index() {

        $data = [
            'breadcrumbs' => 'Dashboard, Peer-evaluate',
            'livewire' => [
                'component' => 'faculty.peer-faculty',
                'data' => [

                ]
            ]
        ];

        $init['response'] = [
            'step' => 1,
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
        
        session($init);
        

        return view('faculty.template', compact('data'));
    }
}
