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
        'computer_or_similar', 'internet', 'audio', 'webcam', 'microphone', 'internet_skill',
        'place', 'has_experience', 'hearing_or_visual_impairment'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public static function getAnswerSurvey(){
        $teleconsultationSurvey = TeleconsultationSurvey::where('user_id', Auth::user()->id)->count();
        return $teleconsultationSurvey;
    }

    public static function getSurveyResults(TeleconsultationSurvey $teleconsultationSurvey){
        if($teleconsultationSurvey->computer_or_similar == 1 &&
              $teleconsultationSurvey->internet == 1 &&
              $teleconsultationSurvey->audio == 1 &&
              $teleconsultationSurvey->webcam == 1){

            return 'green';
        }

        if($teleconsultationSurvey->computer_or_similar == 1 &&
              $teleconsultationSurvey->internet == 1 && (
              $teleconsultationSurvey->audio == 0 ||
              $teleconsultationSurvey->webcam == 0)){

            return 'orange';
        }

        if($teleconsultationSurvey->computer_or_similar == 0 ||
              $teleconsultationSurvey->internet == 0){

            return 'red';
        }
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $table = 'teleconsultation_surveys';
}
