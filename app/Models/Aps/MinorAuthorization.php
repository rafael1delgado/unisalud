<?php

namespace App\Models\Aps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MinorAuthorization extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','type_id','run','dv','names','fathers_family','mothers_family','authorization_date','authorized','authorizer_id'
    ];

    use SoftDeletes;

    public function type()
    {
        return $this->belongsTo('App\Models\Aps\AuthorizationType');
    }

    public function authorizer() {
        return $this->belongsTo('App\Models\User', 'authorizer_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['authorization_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aps_minor_authorizations';
}
