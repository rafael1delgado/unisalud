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

    public function usersPatients() {
        return $this->hasMany('\App\Models\Fq\UserPatient');
    }

    public static function getAmIContact(){
        $contactUser = ContactUser::where('run', Auth::user()->run)->count();
        return $contactUser;
    }

    protected $table = 'fq_contact_users';
}
