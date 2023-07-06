<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family_medical_spec extends Model
{
    protected $table = 'family_medical_spec';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_FHALLERGY',
        'ONE_EF_FHORGANCANCER',
        'ONE_EF_FHHEPATYPE',
        'ONE_EF_FHHIGH',
        'ONE_EF_FHHIGHESTSYSTOLIC',
        'ONE_EF_FHHIGHESTDIASTOLIC',
        'ONE_EF_FHPULTUB',
        'ONE_EF_FHEXPULTUB',
        'ONE_EF_FHOTHERS',
    ];


    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
