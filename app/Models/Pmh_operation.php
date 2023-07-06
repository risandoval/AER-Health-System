<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmh_operation extends Model
{

    protected $table = 'pmh_operation';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_PSH',
        'ONE_EF_DPSO',
        'ONE_EF_PSO',
    ];


    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
