<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genitourinary extends Model
{
    protected $table = 'genitourinary';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_PG_GENIT',
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
