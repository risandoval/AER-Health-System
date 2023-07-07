<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abdomen extends Model
{
    protected $table = 'abdomen';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_PA_ABDOMEN'
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
