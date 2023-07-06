<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fam_plan extends Model
{
    protected $table = 'fam_plan';   

    protected $fillable = [
        'one_ef_client_id',
        'ONE_EF_FPC',    
    ];
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class, 'one_ef_client_id');
    }

}
