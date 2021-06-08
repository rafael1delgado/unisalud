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
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public static function getAmIContact(){
        $contactUser = ContactUser::where('user_id', Auth::user()->id)->count();
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
