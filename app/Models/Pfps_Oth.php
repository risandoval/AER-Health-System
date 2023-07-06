<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pfps_Oth extends Model
{
    protected $table = 'pfps_oth';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_HEENTOTH',
        'ONE_PC_CBLOTH',
        'ONE_PH_HEARTOTH',
        'ONE_PA_ABDOMENOTH',
        'ONE_PG_GENITOTH',
        'ONE_PD_RECTALOTH',
        'ONE_PS_SKINOTH',
        'ONE_PN_NEUROOTH',
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
