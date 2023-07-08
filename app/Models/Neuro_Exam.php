<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neuro_Exam extends Model
{
    protected $table = 'neuro_exam';

    protected $fillable = [
        'one_ef_client_id',
        'ONE_PN_NEURO',
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
