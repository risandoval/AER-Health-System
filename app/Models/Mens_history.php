<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mens_history extends Model
{

    protected $table = 'mens_history';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_MENARCHE',
        'ONE_EF_MENARCHEAGE',
        'ONE_EF_ONSETSEX',
        'ONE_EF_MENOP',
        'ONE_EF_MENOPAGE',
        'ONE_EF_MENSDAYS',
        'ONE_EF_PADS',
    ];

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }

}
