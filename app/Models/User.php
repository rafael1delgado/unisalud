<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * El id no es incremental ya que es el run sin digito verificador
     */
    protected $primaryKey = 'id';
//    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'run',
        'dv',
        'gender',
        'birthday',
        'deceased_datetime',
        'cod_con_marital_id',
        'claveunica',
        'fhir_id',
        'password',
        'claveunica'
    ];

    public function humanNames(): HasMany
    {
        return $this->hasMany(HumanName::class, 'user_id', );
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute() {
        return explode(' ',trim($this->name))[0];
    }

    public function getOfficialFullNameAttribute() {
        return "{$this->officialHumanName()->first()->text} {$this->officialHumanName()->first()->fathers_family} {$this->officialHumanName()->first()->mothers_family}";
    }

    public function officialHumanName()
    {
        return $this->humanNames()->where('use', 'official');
    }

    //Programador (relaciones)
    public function userSpecialties() {
        return $this->hasMany('App\Models\MedicalProgrammer\UserSpecialty');
    }

    public function userProfessions() {
        return $this->hasMany('App\Models\MedicalProgrammer\UserProfession');
    }

    public function userServices() {
        return $this->hasMany('App\Models\MedicalProgrammer\UserService');
    }

    public function specialties() {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Specialty', 'hm_user_specialties')
            ->wherePivot('deleted_at', null);
    }

    public function professions() {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Profession', 'hm_user_professions')
            ->wherePivot('deleted_at', null);
    }

    public function services() {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Service', 'hm_user_services')
            ->wherePivot('deleted_at', null);
    }

    public function userOperatingRooms() {
        return $this->hasMany('App\Models\MedicalProgrammer\UserOperatingRoom');
    }

    public function unscheduledProgrammings() {
        return $this->hasMany('App\Models\MedicalProgrammer\UnscheduledProgramming');
    }

    public function calendarProgrammings() {
        return $this->hasMany('App\Models\MedicalProgrammer\CalendarProgramming');
    }

    public function operatingRoomProgrammings() {
        return $this->hasMany('App\Models\MedicalProgrammer\OperatingRoomProgramming');
    }

    public function theoreticalProgrammings() {
        return $this->hasMany('App\Models\MedicalProgrammer\TheoreticalProgramming');
    }

    public function contracts() {
        return $this->hasMany('App\Models\MedicalProgrammer\Contract');
    }

    public function activities() {
        return $this->hasMany('App\Models\MedicalProgrammer\Activity');
    }

    public function motherActivities() {
        return $this->hasMany('App\Models\MedicalProgrammer\MotherActivity');
    }

    public function rrhhs() {
        return $this->hasMany('App\Models\MedicalProgrammer\Rrhh');
    }

    public function operatingRooms() {
        return $this->hasMany('App\Models\MedicalProgrammer\OperatingRoom');
    }

    //programador (funciones)
    public function getSpecialtiesArray(){
        $array = array();
        foreach ($this->userSpecialties as $key => $userSpecialty) {
            $array[$key] = $userSpecialty->specialty_id;
        }
        return $array;
    }

    public function getProfessionsArray(){
        $array = array();
        foreach ($this->userProfessions as $key => $userProfession) {
            $array[$key] = $userProfession->profession_id;
        }
        return $array;
    }

    public function getOperatingRoomsArray(){
        $array = array();
        foreach ($this->userOperatingRooms as $key => $userOperatingRoom) {
            $array[$key] = $userOperatingRoom->operating_room_id;
        }
        return $array;
    }


}
