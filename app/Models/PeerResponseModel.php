<?php

namespace App\Models;

use App\Livewire\Admin\CurriculumTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerResponseModel extends Model
{
    use HasFactory;

    protected $table = 'afears_peer_response';

    protected $fillable = [
        'user_id',
        'evaluation_id',
        'template_id',
        'faculty_id',
        'semester',
        //'start_time',
        //'end_time',
        'comment',
    ];

    public function items() {
        return $this->hasMany(PeerResponseItemModel::class, 'response_id', 'id');
    }

    public function faculty() {
        return $this->belongsTo(FacultyModel:: class, 'user_id');
    }

    public function template() {
        return $this->belongsTo(CurriculumTemplateModel::class, 'template_id');
    }

}
