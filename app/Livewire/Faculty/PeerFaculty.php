<?php

namespace App\Livewire\Faculty;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

use App\Models\FacultyModel;
use App\Models\BranchModel;

class PeerFaculty extends Component
{

    public $evaluate;
    public $semester;
    public $faculties;
    public $department;
    public $paginate_count;
    public $initPaginate = false;

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
           return redirect()->route('faculty.peer-dashboard');
       }}   

        public function initPaginate() {
            if(!$this->initPaginate) {
                $this->dispatch('initPaginate');
                $this->initPaginate = true;
            }
        }
        public function screen($size) {
            switch($size) {
                case 'sm':
                    $this->paginate_count = 5;
                    break;
                case 'md':
                    $this->paginate_count = 6;
                    break;
                case 'lg':
                    $this->paginate_count = 9;
                    break;
                case 'xl':
                    $this->paginate_count = 12;
                    break;
            }
        }
        public function render(Request $request) {

            $currentUserId = auth()->guard('faculty')->user()->id;
            $departmentId = auth()->guard('faculty')->user()->department_id;
            
            //$departmentId = $this->search['select'] ?? null;

            /*$faculties = FacultyModel::where('department_id', $departmentId)*/
            // $faculty_template = FacultyTemplateModel::with('faculty.departments.branches', 'curriculum_template.subjects.courses.departments.branches')
            //     ->where('faculty_id', $faculty)->get();

            FacultyModel::with('templates')
            ->where('id', $currentUserId)
            ->has('templates');

            $faculty = FacultyModel::with(['departments.branches', 'templates'])
                ->when($departmentId, function ($query) use ($departmentId) {
                    $query->whereHas('departments', function ($subQuery) use ($departmentId) {
                        $subQuery->where('department_id', $departmentId);
                    });
                })
                ->where('id', '!=', $currentUserId)
                ->select('*')
                ->selectRaw('(CASE WHEN EXISTS (
                    SELECT 1
                    FROM afears_peer_response
                    WHERE user_id = ' . $currentUserId . '
                        AND evaluation_id = ' . $this->evaluate . '
                        AND faculty_id = afears_faculty.id
                        AND semester = ' . $this->semester . '
                ) THEN true ELSE false END) AS is_exists')
                ->selectRaw('(SELECT template_id FROM afears_faculty_template WHERE afears_faculty_template.faculty_id = afears_faculty.id ORDER BY id LIMIT 1) AS first_template_id')
                ->paginate($this->paginate_count);
            
                /*->get()->toArray();
                $this->initPaginate();*/

            $branches = BranchModel::with('departments')->get();
        
            $data = [
                'branches' => $branches,
                'faculty' => $faculty
            ];
            
            return view('livewire.faculty.peer-faculty', compact('data'));
        }}