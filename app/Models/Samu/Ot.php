<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Samu\Call;
use App\Models\User;

class Ot extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'call_id',
        'description'
    ];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }
    
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_ots';
    

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (Ot $ot): void {
            $ot->creator()->associate(auth()->user());
        });
    }
}
