<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = '1ef_client';   

    protected $fillable = [
        '1EF_PIN',
        '1EF_LASTNAME',
        '1EF_FIRSTNAME',
        '1EF_MIDDLENAME',
        '1EF_EXTENSIONNAME',
        '1EF_BDAY',
        '1EF_SEX',
        '1EF_BRGY',
    ];

    use HasFactory;
}
