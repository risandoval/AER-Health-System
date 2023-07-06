<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family_medical_history extends Model
{

    protected $table = 'family_medical_history';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_FM_PMH',
    ];

    use HasFactory;


    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
