<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immu_adult extends Model
{

    protected $table = 'immu_adult';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_IA_IMMADULT',
    ];


    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
