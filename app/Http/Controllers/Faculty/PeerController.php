<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeerController extends Controller
{
    public function index() {

        $data = [
            'breadcrumbs' => 'Dashboard, Peers',
            'livewire' => [
                'component' => 'faculty.peer',
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
