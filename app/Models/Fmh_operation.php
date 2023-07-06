<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fmh_operation extends Model
{

    protected $table = 'fmh_operation';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_FO_FHSH',
        'ONE_FO_DFSO',
        'ONE_FO_FSO',
    ];
    
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
