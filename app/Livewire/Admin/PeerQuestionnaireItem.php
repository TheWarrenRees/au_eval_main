<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PeerQuestionnaireModel;
use App\Models\PeerQuestionnaireItemModel;
use Illuminate\Http\Request;

class PeerQuestionnaireItem extends Component
{
    public $form;
    public $select;
    public bool $is_update = false;
    public $search;
    public $id;
    public $slug;
    public $questionnaire_id;
    public $questionnaire_item_id;
    public $criteria_id;
    public $item;
    public $criterias;
    public $items;

    public $attr = [
        'criteria_id' => 'Criteria name',
        'item' => 'Questionnaire item'
    ];

    public function loadItems() {

        $dirty_data = PeerQuestionnaireModel::with(['questionnaire_item.criteria'])
            ->where('id', $this->id)->get();

        $cleaned_data = [];

        foreach ($dirty_data[0]['questionnaire_item'] as $item) {
            $key = $item['criteria']->name;

            if(!isset($cleaned_data[$key])) {
                $cleaned_data[$key] = [
                    'criteria' => $key,
                    'peer_questionnaire_item' => []
                ];
            }

            $cleaned_data[$key]['questionnaire_item'][] = [
                'id' => $item->id,
                'items' => $item->item
            ];
        }

        $this->items = array_values($cleaned_data);

    }

    public function save() {

        if(empty($this->questionnaire_item_id)) {
            $this->is_update = false;
        }

        if(!$this->is_update) {
            $rules = [
                'questionnaire_id' => 'required|integer|exists:afears_peer_questionnaire,id',
                'criteria_id' => 'required|integer|exists:afears_criteria,id',
                'item' => [
                    'required',
                    'string',
                    'min:8',
                ]
            ];

            $this->validate($rules, [], $this->attr);

            $data = [
                'questionnaire_id' =>  $this->questionnaire_id,
                'criteria_id' =>  $this->criteria_id,
                'item' =>  $this->item,
            ];

            try {

                $model = new PeerQuestionnaireItemModel;

                $model->questionnaire_id = $this->questionnaire_id;
                $model->criteria_id = $this->criteria_id;
                $model->item = $this->item;

                $model->save();

                $this->dispatch('alert');
                session()->flash('alert', [
                    'message' => 'Saved.'
                ]);

                $this->reset('item');

            } catch (\Exception $e) {
                session()->flash('flash', [
                    'status' => 'failed',
                    'message' => $e->getMessage()
                ]);
            }
        } else {

            $rules = [
                'questionnaire_id' => 'required|integer|exists:afears_peer_questionnaire,id',
                'questionnaire_item_id' => 'required|integer|exists:afears_peer_questionnaire_item,id',
                'criteria_id' => 'required|integer|exists:afears_criteria,id',
                'item' => [
                    'required',
                    'string',
                    'min:8',
                ]
            ];

            $this->validate($rules, [], $this->attr);

            $data = [
                'criteria_id' =>  $this->criteria_id,
                'item' =>  $this->item,
            ];

            try {

                PeerQuestionnaireItemModel::where('id', $this->questionnaire_item_id)->update($data);

                $this->reset('questionnaire_item_id', 'criteria_id', 'item');

                $this->dispatch('alert');
                session()->flash('alert', [
                    'message' => 'Updated.'
                ]);

            } catch (\Exception $e) {
                session()->flash('flash', [
                    'status' => 'failed',
                    'message' => $e->getMessage()
                ]);
            }
        }
    }

    public function update($id) {

        $data = PeerQuestionnaireItemModel::where('id', $id);
        if($data->exists()) {
            $data = $data->first();
            $this->is_update = true;
            $this->questionnaire_id = $data->questionnaire_id;
            $this->questionnaire_item_id = $data->id;
            $this->criteria_id = $data->criteria_id;
            $this->item = $data->item;
        } else {
            return redirect()->route('admin.programs.questionnaire');
        }
    }

    public function delete($id) {

        $model = PeerQuestionnaireItemModel::where('id', $id)->first();

        if($model) {
            $model->delete();

            $this->dispatch('alert');
            session()->flash('alert', [
                'message' => 'Deleted.'
            ]);

            $this->reset('criteria_id', 'item');

        } else {
            session()->flash('flash', [
                'status' => 'failed',
                'message' => 'No records found for id `'.$id.'`. Unable to delete.'
            ]);
        }
    }

    public function __reset() {
        $this->is_update = false;
        $this->reset('criteria_id', 'item');
    }

    public function mount() {

        $id = $this->form['id'];

        $data = PeerQuestionnaireModel::where('id', $id)->first();

        $this->id = $data->id ?? '';
        $this->questionnaire_id = $data->id ?? '';

        $this->loadItems();
    }

    public function render(Request $request) {

        $action = $request->input('action');

        $questionnaire = PeerQuestionnaireModel::with(['school_year'])
            ->when(strlen($this->search) >= 1, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })->get();


        $data = [
            'questionnaire' => $questionnaire,
            'data' => $this->items
        ];

        return view('livewire.admin.peer-questionnaire-item');
    }
}
