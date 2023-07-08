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
        return $this->hasMany(Family_medical_history::class, 'one_ef_client_id');
    }

    public function family_medical_spec(){
        return $this->hasOne(Family_medical_spec::class, 'one_ef_client_id');
    }

    public function fmh_operation(){
        return $this->hasMany(Fmh_operation::class, 'one_ef_client_id');
    }

    public function Immu_Children(){
        return $this->hasMany(Immu_Children::class, 'one_ef_client_id');
    }

    public function immu_adult(){
        return $this->hasMany(Immu_adult::class, 'one_ef_client_id');
    }

    public function social_history(){
        return $this->hasOne(Social_history::class, 'one_ef_client_id');
    }

    public function immu_preg(){
        return $this->hasMany(Immu_preg::class, 'one_ef_client_id');
    }

    public function immu_eld(){
        return $this->hasMany(Immu_eld::class, 'one_ef_client_id');
    }

    public function immothers(){
        return $this->hasOne(Immothers::class, 'one_ef_client_id');
    }

    public function fam_plan(){
        return $this->hasOne(Fam_plan::class, 'one_ef_client_id');
    }

    public function mens_history(){
        return $this->hasOne(Mens_history::class, 'one_ef_client_id');
    }

    public function birth_method(){
        return $this->hasOne(Birth_method::class, 'one_ef_client_id');
    }

    public function preg_history(){
        return $this->hasOne(Preg_history::class, 'one_ef_client_id');
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

    public function genitourinary() {
        return $this->hasMany(Genitourinary::class, 'one_ef_client_id');
    }

    public function dre() {
        return $this->hasMany(Dre::class, 'one_ef_client_id');
    }

    public function skin() {
        return $this->hasMany(Skin::class, 'one_ef_client_id');
    }

    public function neuro_exam() {
        return $this->hasMany(Neuro_exam::class, 'one_ef_client_id');
    }

    public function pfps_oth() {
        return $this->hasOne(Pfps_oth::class, 'one_ef_client_id');
    }

    public function ncd_hra() {
        return $this->hasOne(Ncd_hra::class, 'one_ef_client_id');
    }

}
