<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ncd_Hra extends Model
{
    protected $table = 'ncd_hra';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_FATFOOD',
        'ONE_EF_VEG',
        'ONE_EF_FRUIT',
        'ONE_EF_PHYACTIV',
        'ONE_EF_DIABETES',
        'ONE_EF_DIABETESYES',
        'ONE_EF_SYMPTOMS',
        'ONE_EF_RBG',
        'ONE_EF_FBSRBS',
        'ONE_EF_RBGL',
        'ONE_EF_RBGDATE',
        'ONE_EF_RBL',
        'ONE_EF_RBLDATE',
        'ONE_EF_CHOLESTEROL',
        'ONE_EF_KETONESPRES',
        'ONE_EF_KETONES',
        'ONE_EF_KETONESDATE',
        'ONE_EF_PROTEINPRES',
        'ONE_EF_PROTEIN',
        'ONE_EF_PROTEINDATE',
        'ONE_EF_AHA',
        'ONE_EF_CHESTPAIN',
        'ONE_EF_CENTERPAIN',
        'ONE_EF_UPHILL',
        'ONE_EF_WALKING',
        'ONE_EF_TONGUE',
        'ONE_EF_10M',
        'ONE_EF_CHESTFRONT',
        'ONE_EF_SATIA',
        'ONE_EF_DIFF',
        'ONE_EF_RISK'
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
