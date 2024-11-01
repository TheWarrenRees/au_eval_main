<?php

namespace App\Livewire\Admin;

use App\Models\FacultyModel;
use App\Models\QuestionnaireModel;
use App\Models\ResponseModel;
use App\Models\PeerQuestionnaireModel;
use App\Models\PeerResponseModel;
use chillerlan\QRCode\QRCode;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\Censored;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use Illuminate\Support\Facades\Response;


class ValidateResponses extends Component
{

    use WithFileUploads;
    use Censored;

    public $form;
    public $type;
    public $code;
    public $kind;

    public $result_view;

    public $display = [
        'wm' => false,
        'sqm' => false,
        'std' => false,
        'itrprtn' => false,
        'comments' => false
    ];

    public $attr = [
        'code' => 'Code',
        'kind' => 'Prefix'
    ];

    public function onchangeType() {
        $this->reset('result_view');
    }

    public function submit() {

        if($this->type == 1) {
            $rule = [
                'code' => 'required|integer',
                'kind' => 'required|integer|in:1,2,',
            ];

            $this->validate($rule, [], $this->attr);

            $this->get_responses($this->code);
        } else if($this->type == 2) {
            $rule = [
                'code' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            ];

            $this->validate($rule, [], $this->attr);

            $reference = $this->decode_qr($this->code->path());
            if($reference) {
                $this->get_responses($reference);
            }

            $this->reset('code');
        }

        if(!session()->has('error')) {
            $this->reset('code', 'type', 'kind');
        } else {
            $this->reset('result_view');
        }
    }

    public function decode_qr($image) {
        try {
            $qr = new QRCode();
            $string = $qr->readFromFile($image);
            $split = explode('_', $string);

            if (sizeof($split)==4) {
                $this->kind = 1;
            } elseif(sizeof($split)==5) {
                $this->kind = 2;
            }
            $end = end($split);
            return $end;
        } catch (\Throwable $e) {
            session()->flash('error', ucfirst($e->getMessage()));
        }
    }

    public function get_responses($reference) {

        if(!session()->has('settings')) {
            $this->result_settings();
        }

        $this->display = session('settings')['evaluation_result_display'];

        $evaluation_result = [
            'total_responses' => 0,
            'total_items' => 0,
            'comments' => '',
            'respondents' => [
                'total_respondents' => 0,
                'respondents' => 0,
                'not_responded' => 0
            ],
            'total_interpretation' => [
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0
            ],
            'averages' => [
                'mean' => 0,
                'squared_mean' => 0,
                'standard_deviation' => 0,
                'descriptive_interpretation' => 0,
            ],
            'stats' => [],
        ];


        if($this->kind == 1){
        $responseModel = new ResponseModel;}
        elseif($this->kind == 2){
            $responseModel = new PeerResponseModel;}

        $responses_data = $responseModel->where('id', $reference);

        if($responses_data->exists()) {

            $responses_data = $responseModel->where('id', $reference)->get()[0];
            $evaluation_id = $responses_data->evaluation_id;
            $template_id = $responses_data->template_id;
            $faculty_id = $responses_data->faculty_id;

            // questionnaires
            if($this->kind == 1){
                $questionnaire = QuestionnaireModel::with('questionnaire_item.criteria')
                ->where('school_year_id', $evaluation_id)->get()[0];
                } elseif($this->kind == 2){
                        $questionnaire = PeerQuestionnaireModel::with('questionnaire_item.criteria')
                    ->where('school_year_id', $evaluation_id)->get()[0];
            }
            
                if($this->kind == 1){
                    $responses = ResponseModel::with('students.courses.departments.branches', 'items.questionnaire.criteria')
                            ->where('evaluation_id', $evaluation_id)
                            ->where('template_id', $template_id)
                            ->where('faculty_id', $faculty_id)
                            ->where('id', $reference)->get();
                        } elseif($this->kind == 2){
                            $responses = PeerResponseModel::with('faculty.departments.branches', 'items.questionnaire.criteria')
                            ->where('evaluation_id', $evaluation_id)
                            ->where('template_id', $template_id)
                            ->where('faculty_id', $faculty_id)
                            ->where('id', $reference)->get();
            }

            $sorted_responses = [];

            foreach ($responses as $response) {
                foreach ($response['items'] as $item) {
                    $sorted_responses[] = [
                        'questionnaire_id' => $item['questionnaire_id'],
                        'response_id' => $item['response_id'],
                        'response_rating' => $item['response_rating'],
                    ];
                }

                if($this->kind == 1){
                    $respondent_name = ucwords($response['students']['firstname']. ' ' . $response['students']['lastname']);}
                    elseif($this->kind == 2){
                        $respondent_name = $response['faculty']['firstname']. ' ' . $response['faculty']['lastname'];}

                $comment_analysis = analyzesentiment($response['comment']);

                $sentiment = 'No result';

                $vader_scores_compound = floatval(number_format($comment_analysis['compound'], 2, '.', ''));
                $vader_scores_pos = floatval(number_format($comment_analysis['pos'] * 100, 2, '.', ''));
                $vader_scores_neu = floatval(number_format($comment_analysis['neu'] * 100, 2, '.', ''));
                $vader_scores_neg = floatval(number_format($comment_analysis['neg'] * 100, 2, '.', ''));


                if ($comment_analysis['compound']>= 0.5) {
                    $sentiment = 'Positive sentiment';
                } elseif ($comment_analysis['compound'] > 0 && $comment_analysis['compound'] < 0.5) {
                    $sentiment = 'Slightly positive sentiment';
                } elseif ($comment_analysis['compound'] == 0) {
                    $sentiment = 'Neutral sentiment';
                } elseif ($comment_analysis['compound'] > -0.5 && $comment_analysis['compound'] < 0) {
                    $sentiment = 'Slightly negative sentiment';
                } else {
                    $sentiment = 'Negative sentiment';
                }
                // 
                $comments[] = [
                    'commented_by' => $this->applyCensored($respondent_name),
                    'comment' => $response['comment'],
                    'neg' => $vader_scores_neg,
                    'neu' => $vader_scores_neu,
                    'pos' => $vader_scores_pos,
                    'compound' => $vader_scores_compound,
                    'sentiment' => $sentiment
                ];
                //add to array
                $vader_scores['compound'][] = $vader_scores_compound;
                $vader_scores['pos'][] = $vader_scores_pos;
                $vader_scores['neu'][] = $vader_scores_neu;
                $vader_scores['neg'][] = $vader_scores_neg;
                }

            $evaluation_result = [
                'total_responses' => 0,
                'total_items' => 0,
                'comments' => $comments,
                'respondents' => [
                    'total_respondents' => 0,
                    'respondents' => 0,
                    'not_responded' => 0
                ],
                'total_interpretation' => [
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0
                ],
                'averages' => [
                    'mean' => 0,
                    'squared_mean' => 0,
                    'standard_deviation' => 0,
                    'descriptive_interpretation' => 0,
                ],
                'stats' => [],
            ];

            // bind tally of responses to designated questionnaires
            foreach ($questionnaire['questionnaire_item'] as $item) {
                $key = $item['criteria_id'];
                if (!isset($evaluation_result['stats'][$key])) {
                    $evaluation_result['stats'][$key] = [
                        'id' => $item['id'],
                        'criteria_name' => $item['criteria']['name'],
                        'items' => []
                    ];
                }

                $evaluation_result['total_items']++;

                foreach ($sorted_responses as $response) {
                    if ($response['questionnaire_id'] == $item['id']) {
                        $evaluation_result['total_responses'] = count($responses);
                        if (!isset($evaluation_result['stats'][$key]['items'][$response['questionnaire_id']])) {
                            $evaluation_result['stats'][$key]['items'][$response['questionnaire_id']] = [
                                'id' => $item['id'],
                                'response_id' => $response['response_id'],
                                'name' => $item['item'],
                                'weighted_mean' => '',
                                'mean_squared' => '',
                                'standard_deviation' => '',
                                'interpretation' => '',
                                'comments' => $comments,
                                'tally' => [
                                    '1' => 0,
                                    '2' => 0,
                                    '3' => 0,
                                    '4' => 0
                                ]
                            ];
                        }

                        $evaluation_result['stats'][$key]['items'][$response['questionnaire_id']]['tally'][$response['response_rating']]++;
                    }
                }

            }

            // reset indexed values
            $evaluation_result['stats'] = array_values($evaluation_result['stats']);
            foreach ($evaluation_result['stats'] as &$criteria) {
                $criteria['items'] = array_values($criteria['items']);
            }

            // compute weighted mean
            foreach ($evaluation_result['stats'] as $key => &$criteria) {
                foreach ($criteria['items'] as &$item) {
                    $tally = [];
                    foreach ($item['tally'] as $key => $value) {
                        $tally[$key] = $key * $value;
                    }
                    $total = array_sum($tally) / (int) $evaluation_result['total_responses'];
                    $item['weighted_mean'] = $total;
                }
            }

            // compute mean squared
            foreach ($evaluation_result['stats'] as &$criteria) {
                foreach ($criteria['items'] as &$item) {
                    $tally = [];
                    foreach ($item['tally'] as $key => &$value) {
                        $squared = ($key * $key);
                        $tally[$key] = $squared * $value;
                    }
                    $total = array_sum($tally) / (int) $evaluation_result['total_responses'];
                    $item['mean_squared'] = $total;
                }
            }

            // compute standard deviation
            foreach ($evaluation_result['stats'] as &$criteria) {
                foreach ($criteria['items'] as &$item) {
                    $sd = sqrt((int)$item['mean_squared'] - (int) $item['weighted_mean']);
                    $item['standard_deviation'] = $sd;
                }
            }

            // put the interpretation
            foreach ($evaluation_result['stats'] as &$criteria) {
                foreach ($criteria['items'] as &$item) {
                    $interpretation = $this->interpretation($item['weighted_mean']);
                    $item['interpretation'] = $interpretation;
                    $evaluation_result['total_interpretation'][$interpretation]++;
                }
            }

            // compute average mean

            $mean = 0;
            $squared = 0;
            $std = 0;

            foreach($evaluation_result['stats'] as $key => $results) {

                foreach($results['items'] as $items) {
                    $mean += $items['weighted_mean'];
                    $squared += $items['mean_squared'];
                    $std += $items['standard_deviation'];
                }

                if($evaluation_result['total_responses'] > 0) {
                    $evaluation_result['averages'] = [
                        'mean' => $mean / $evaluation_result['total_items'],
                        'squared_mean' => $squared / $evaluation_result['total_items'],
                        'standard_deviation' => $std / $evaluation_result['total_items'],
                        'descriptive_interpretation' => $this->interpretation($mean / $evaluation_result['total_items'])
                    ];
                } else {
                    $evaluation_result['averages'] = [
                        'mean' => 0,
                        'squared_mean' => 0,
                        'standard_deviation' => 0,
                        'descriptive_interpretation' => 0
                    ];
                }

            }

            $evaluation_result['stats'] = array_values($evaluation_result['stats']);

            $faculty = FacultyModel::with([
                'templates' => function($query) use ($template_id) {
                    $query->where('template_id', $template_id);
                },
                'templates.curriculum_template.subjects.courses.departments.branches'
            ])
            ->where('id', $faculty_id)
            ->whereHas('templates', function($query) use ($template_id) {
                $query->where('template_id', $template_id);
            })
            ->get()[0];

            if($this->kind == 1){
                $respondent = $responses[0]->students;}
                elseif($this->kind == 2){
                    $respondent = $responses[0]->faculty;}

            $this->result_view = [
                'kind' => $this->kind,
                'respondent' => $respondent,
                'faculty' => $faculty,
                'evaluation_result' => $evaluation_result,
                'vader_scores' => $vader_scores
            ];

        } else {
            session()->flash('error', 'No response result found.');
        }
    }

    public function result_settings() {
        $to_save = [
            'settings' => [
                'evaluation_result_display' => $this->display
            ]
        ];

        session($to_save);
    }

    public function interpretation($value) {
        if($value >= 0 && $value <= 1.49) {
            return 1;
        } else if($value >= 1.50 && $value <= 2.49) {
            return 2;
        } else if ($value >= 2.50 && $value <= 3.49){
            return 3;
        } else if($value >= 3.50) {
            return 4;
        }
    }

    public function render()
    {
        return view('livewire.admin.validate-responses');
    }

    public function save_pdf() {

        $data = [
            'display' => $this->display,
            'view' => $this->result_view
        ];

        $pdf = PDF::loadView('printable.result-view', $data);

        $faculty = $this->result_view['faculty'];
        $filename = strtolower('evaluation_result_of_' . $faculty->firstname . '_' . $faculty->lastname . '_' .time().'.pdf');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $filename);

    }

    public function save_excel() {

        $data = [
            'display' => $this->display,
            'view' => $this->result_view
        ];

        $spreadsheet = new Spreadsheet();

        // Set active sheet
        $spreadsheet->setActiveSheetIndex(0);

        // HTML content to be converted to Excel
        $html = View::make('printable.result-view', $data)->render();

        // Load HTML content into PHPExcel
        $reader = new HTML();
        $spreadsheet = $reader->loadFromString($html);

        // Set column widths after loading HTML content
        $sheet = $spreadsheet->getActiveSheet();

        for ($i = 'A'; $i <= $sheet->getHighestColumn(); $i++) {
            if($i != 'B') {
                $sheet->getColumnDimension($i)->setAutoSize(true);
            } else {
                $sheet->getColumnDimension('B')->setWidth(5);
            }
        }

        $faculty = $this->result_view['faculty'];
        $filename = strtolower('evaluation_result_of_' . $faculty->firstname . '_' . $faculty->lastname . '_' .time().'.xlsx');

        // Save Excel file
        $tempFilePath = storage_path('app/'.$filename);
        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFilePath);

        // Return the Excel file as a downloadable response
        return Response::download($tempFilePath, $filename)->deleteFileAfterSend(true);

    }

}
