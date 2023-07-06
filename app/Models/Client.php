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
        return $this->hasOne(PastMedicalSpec::class, 'one_ef_client_id');
    }
    
    public function pmh_operation(){
        return $this->hasMany(Pmh_operation::class, 'one_ef_client_id');
    }

    public function family_medical_history(){

        return $this->hasMany(family_medical_history::class, 'one_ef_client_id');
    }

    public function family_medical_spec(){

        return $this->hasOne(family_medical_spec::class, 'one_ef_client_id');
    }

    public function fmh_operation(){

        return $this->hasMany(fmh_operation::class, 'one_ef_client_id');
    }

    public function Immu_Children(){

        return $this->hasMany(Immu_Children::class, 'one_ef_client_id');
    }

    public function immu_adult(){

        return $this->hasMany(immu_adult::class, 'one_ef_client_id');
    }

    public function social_history(){

        return $this->hasMany(social_history::class, 'one_ef_client_id');
    }

    public function immu_preg(){

        return $this->hasMany(immu_preg::class, 'one_ef_client_id');
    }

    public function immu_eld(){

        return $this->hasMany(immu_eld::class, 'one_ef_client_id');
    }

    public function immothers(){

        return $this->hasOne(immothers::class, 'one_ef_client_id');
    }

    public function fam_plan(){

        return $this->hasOne(fam_plan::class, 'one_ef_client_id');
    }

    public function mens_history(){

        return $this->hasOne(mens_history::class, 'one_ef_client_id');
    }

    public function birth_method(){

        return $this->hasOne(birth_method::class, 'one_ef_client_id');
    }

    public function preg_history(){

        return $this->hasOne(preg_history::class, 'one_ef_client_id');
    }

   



}
