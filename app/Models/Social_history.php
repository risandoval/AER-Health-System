<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_history extends Model
{

    protected $table = 'social_history';   

    protected $fillable = [

        'one_ef_client_id',
        'ONE_EF_SMOKE',
        'ONE_EF_PACKS',
        'ONE_EF_ALC',
        'ONE_EF_BOT',
        'ONE_EF_DRUGS',
        'ONE_EF_SEXACTIVE',
        'ONE_EF_IMMUNO',
       
    ];


    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
