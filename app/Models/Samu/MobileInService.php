<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileCrew;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\User;

class MobileInService extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_mobiles_in_service";

    protected $fillable = [
        'id',
        'shift_id',
        'mobile_id',
        'type',
        'position',
        'o2',
        'lunch_start_at',
        'lunch_end_at',
        'observation',
        'status',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'lunch_start_at',
        'lunch_end_at',
    ];

    public function shift()
    {
        return $this->BelongsTo(Shift::class);
    }

    public function mobile()
    {
        /* HasOne? */
        return $this->belongsTo(Mobile::class);
    }

    public function crew()
    {
        // $mobileCrews = MobileCrew::where('mobiles_in_service_id',$this->id)
        //                 ->with('user')
        //                 ->get();
        // $users = collect();
        // foreach($mobileCrews as $mc) {
        //     $users->add($mc->user);
        // }
        // return $users;
        return $this->belongsToMany(User::class,'samu_mobile_crew','mobiles_in_service_id')
                    //->join('amenity_master','amenity_icon_url','=','image_url')
                    ->using(MobileCrew::class)
                    ->withPivot('id','job_type_id','assumes_at','leaves_at')
                    ->withTimestamps();
    }


    public function follows()
    {
        return $this->belongsToMany(Follow::class,'samu_follow_mis');    
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
