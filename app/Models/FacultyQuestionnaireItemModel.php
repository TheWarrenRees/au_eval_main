<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyQuestionnaireItemModel extends Model
{
    use HasFactory;

    protected $table = 'afears_peer_questionnaire_item';
    protected $fillable = [
        'questionnaire_id',
        'criteria_id',
        'item'
    ];

    public function criteria() {
        return $this->hasOne(CriteriaModel::class, 'id', 'criteria_id');
    }
}
