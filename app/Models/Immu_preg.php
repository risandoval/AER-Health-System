<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immu_preg extends Model
{

    protected $table = 'immu_preg';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_IP_IMMPREG',
    ];

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
