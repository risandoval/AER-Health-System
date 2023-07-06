<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birth_method extends Model
{

    protected $table = 'birth_method';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_BC_BCM',
        'ONE_BC_CYCLE',      
    ];


    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }


}
