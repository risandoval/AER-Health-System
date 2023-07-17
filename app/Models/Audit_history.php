<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit_history extends Model
{

    protected $table = 'audit_history';   

    protected $fillable = [
        'username',
        'full_name',
        'action',      
    ];

    use HasFactory;
}
