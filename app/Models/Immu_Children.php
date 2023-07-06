<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immu_Children extends Model
{

    protected $table = 'immu_children';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_IC_IMMCHILD',
    ];

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }
}
