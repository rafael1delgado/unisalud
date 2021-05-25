<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MedicalProgrammer\OperatingRooms\ExecutedActivity;

class Speciality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','n820','deis','sigte','description'
    ];

    public function executedActivities() {
        return $this->hasMany('App\Models\MedicalProgrammer\OperatingRooms\ExecutedActivity');
    }

    public function getActivities()
    {
        //$activities = $this->all();
        //return $activities->groupBy('medic_specialty');

        $activities = ExecutedActivity::where('specialty_id', $this->id)->get();
        return $activities;
    }

    //protected $primaryKey = 'deis';

    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_specialty';
}
