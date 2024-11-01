<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerResponseItemModel extends Model
{
    use HasFactory;

    protected $table = 'afears_peer_response_item';

    protected $fillable = [
        'response_id',
        'questionaire_id',
        'response_rating',
    ];

    public $timestamps = false;

    public function questionnaire() {
        return $this->hasOne(PeerQuestionnaireItemModel::class, 'id',  'questionnaire_id');
    }

}
