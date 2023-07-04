<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastMedicalHistory extends Model
{   
    protected $table = 'past_medical_history';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_PM_PMH',
    ];


    use HasFactory;


    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }

    
}
