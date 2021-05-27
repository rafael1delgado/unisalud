<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class ContactUser extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'run', 'dv', 'name', 'fathers_family', 'mothers_family', 'email',
        'telephone', 'telephone2', 'address', 'commune'
    ];

    public function usersPatients() {
        return $this->hasMany('\App\Models\Fq\UserPatient');
    }

    public static function getAmIContact(){
        $contactUser = ContactUser::where('run', Auth::user()->run)->count();
        return $contactUser;
    }

    public function getRunFormatAttribute() {
        return $this->run . '-' . $this->dv;
    }

    public function getFullNameAttribute() {
        return mb_convert_case(mb_strtolower("{$this->name} {$this->fathers_family} {$this->mothers_family}"), MB_CASE_TITLE, "UTF-8");
    }

    protected $table = 'fq_contact_users';
}
