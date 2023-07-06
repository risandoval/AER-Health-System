<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preg_history extends Model
{

    protected $table = 'preg_history';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_LIVCHILD',
        'ONE_EF_ABORT',
        'ONE_EF_PREMATURE',
        'ONE_EF_FULLTERM',
        'ONE_EF_DELIVERYTYPE',
        'ONE_EF_PARI',
        'ONE_EF_GRAV',
        'ONE_EF_ECLAMPSIA',
    ];

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
