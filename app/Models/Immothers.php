<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immothers extends Model
{
    protected $table = 'immothers';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_IMMCHILDOTH',
        'ONE_EF_IMMADULTOTH',
        'ONE_EF_IMMPREGOTH',
        'ONE_EF_IMMELDOTH',
    ];

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
