<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heent extends Model
{
    protected $table = 'heent';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_HE_HEENT',
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
