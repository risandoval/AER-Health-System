<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ppef extends Model
{
    protected $table = 'ppef';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_BPSYSTOLIC',
        'ONE_EF_BPDIASTOLIC',
        'ONE_EF_WEIGHT',
        'ONE_EF_HEIGHT',
        'ONE_EF_BMI',
        'ONE_EF_RESPRATE',
        'ONE_EF_VAL',
        'ONE_EF_VAR',
        'ONE_EF_TEMP',
        'ONE_EF_LENGTH',
        'ONE_EF_HCIRCUM',
        'ONE_EF_SKINFOLD',
        'ONE_EF_WAIST',
        'ONE_EF_MAUACIRCUM',
        'ONE_EF_HIP',
        'ONE_EF_LIMBS',
        'ONE_EF_BLOODTYPE',
        'ONE_EF_AAA',
        'ONE_EF_AS',
    ];


    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
