<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'one_ef_client';   

    protected $fillable = [
        'ONE_EF_HSAD',
        'ONE_EF_PIN',
        'ONE_EF_ATC',
        'ONE_EF_LASTNAME',
        'ONE_EF_FIRSTNAME',
        'ONE_EF_MIDDLENAME',
        'ONE_EF_EXTENSIONNAME',
        'ONE_EF_BDAY',
        'ONE_EF_SEX',
        'ONE_EF_BRGY',
    ];

    use HasFactory;


    //php artisan make:model name-of-model -m

    public function past_medical_history() {
        // return $this->hasMany(OnePm::class, 'one_ef_client_id');
        return $this->hasMany(PastMedicalHistory::class, 'one_ef_client_id');
    }

    public function past_medical_spec() {
        // return $this->hasMany(OnePm::class, 'one_ef_client_id');
        return $this->hasOne(PastMedicalSpec::class, 'one_ef_client_id');
    }

    public function ppef() {
        return $this->hasOne(Ppef::class, 'one_ef_client_id');
    }

    public function heent() {
        return $this->hasMany(Heent::class, 'one_ef_client_id');
    }

    public function cbl() {
        return $this->hasMany(Cbl::class, 'one_ef_client_id');
    }

    public function heart() {
        return $this->hasMany(Heart::class, 'one_ef_client_id');
    }

    public function abdomen() {
        return $this->hasMany(Abdomen::class, 'one_ef_client_id');
    }

    

}
