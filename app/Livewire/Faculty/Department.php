<?php

namespace App\Livewire\Faculty;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

use App\Models\FacultyModel;
use App\Models\DepartmentModel;

class Department extends Component
{
    public $evaluate;
    public $semester;
    public $departments;

    public function mount(Request $request) {

        $evaluate = $request->input('evaluate');
        $semester = $request->input('semester');

        $this->evaluate = $evaluate;
        $this->semester = $semester;

        $input = [
            'id' => $evaluate,
            'semester' => $semester
        ];

        $rules = [
            'id' => [
                'required',
                'integer',
                Rule::exists('afears_school_year')->where(function($query) use($evaluate, $semester) {
                    $query->where('id', $evaluate)
                        ->where('semester', $semester)
                        ->where('status', '1');
                })
            ],
            'semester' => [
                'required',
                'integer'
            ]
        ];


        $validate = Validator::make($input, $rules);

        if($validate->fails()) {
            return redirect()->route('faculty.dashboard');
        }

        $user_id = auth()->guard('faculty')->user()->id;

        $user_data = FacultyModel::find($user_id);

        $department_id = $user_data->department_id;

        $data = DepartmentModel::with('branches')
            ->where('id', $department_id)
            ->get();

        $this->departments = $data;
    }
    public function render()
    {
        return view('livewire.faculty.department');
    }
}
