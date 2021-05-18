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
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'dv',
        'name',
        'fathers_family',
        'mothers_family',
        'email',
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


}
