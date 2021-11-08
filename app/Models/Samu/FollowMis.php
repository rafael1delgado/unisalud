<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Follow;

class FollowMis extends Model
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

     protected $table="samu_follow_mis";
     protected $fillable = [
        
     'id',
     'mis_id',
     'follows_id',
     'created_at'
     ];
     public function mobileInService()
    {
         return $this->BelongsTo(MobileInService::class, 'samu_mobiles_in_service', 'mis_id');
       
    }
    public function follow()
    {
        return $this->BelongsTo(Follow::class, 'follow_id');
    }












}
