<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dre extends Model
{
    protected $table = 'dre';

    protected  $fillable = [
        'one_ef_client_id',
        'ONE_PD_RECTAL'
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
