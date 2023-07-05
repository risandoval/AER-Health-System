<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cbl extends Model
{
    protected $table = 'cbl';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_PC_CBL'
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
