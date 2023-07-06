<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastMedicalSpec extends Model
{

    protected $table = 'past_medical_spec';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_ALLERGY',
        'ONE_EF_ORGANCANCER',
        'ONE_EF_HEPATYPE',
        'ONE_EF_HIGHESTSYSTOLIC',
        'ONE_EF_HIGHESTDIASTOLIC',
        'ONE_EF_PULTUB',
        'ONE_EF_EXPULTUB',
        'ONE_EF_PMHOTHERS',
    ];

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
