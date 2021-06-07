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

    // public function usersPatients() {
    //     return $this->hasMany('\App\Models\Fq\UserPatient');
    // }

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

    // public function scopeSearch($query, $search)
    // {
    //     if ($search) {
    //         $array_search = explode(' ', $search);
    //         foreach($array_search as $word){
    //             $query->where(function($query) use($word){
    //                 $query->where('name', 'LIKE', '%'.$word.'%')
    //                       ->orwhere('fathers_family','LIKE', '%'.$word.'%')
    //                       ->orwhere('mothers_family','LIKE', '%'.$word.'%')
    //                       ->orwhere('run','LIKE', '%'.$word.'%')
    //                       ->orwhere('other_identification','LIKE', '%'.$word.'%');
    //             });
    //         }
    //     }
    // }

    protected $table = 'fq_contact_users';
}
