<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TeleconsultationSurvey extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'computer_or_similar', 'audio', 'webcam', 'microphone', 'internet_skill',
        'place', 'has_experience', 'hearing_or_visual_impairment'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public static function getAnswerSurvey(){
        $teleconsultationSurvey = TeleconsultationSurvey::where('user_id', Auth::user()->id)->count();
        return $teleconsultationSurvey;
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $table = 'teleconsultation_surveys';
}
