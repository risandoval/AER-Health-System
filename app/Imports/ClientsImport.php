<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ClientsImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            $client = Client::updateOrCreate((['ONE_EF_PIN' => $row['one_ef_pin']] != null ? ['ONE_EF_PIN' => $row['one_ef_pin']] : ['ONE_EF_LASTNAME' => $row['one_ef_lastname'], 'ONE_EF_FIRSTNAME' => $row['one_ef_firstname'], 'ONE_EF_BDAY' => $row['one_ef_bday']]), [
                'ONE_EF_HSAD' => $row['one_ef_hsad'],
                'ONE_EF_PIN' => $row['one_ef_pin'],
                'ONE_EF_ATC' => $row['one_ef_atc'],
                'ONE_EF_LASTNAME' => $row['one_ef_lastname'],
                'ONE_EF_FIRSTNAME' => $row['one_ef_firstname'],
                'ONE_EF_MIDDLENAME' => $row['one_ef_middlename'],
                'ONE_EF_EXTENSIONNAME' => $row['one_ef_extensionname'],
                'ONE_EF_BDAY' => $row['one_ef_bday'],
                'ONE_EF_SEX' => $row['one_ef_sex'],
                'ONE_EF_BRGY' => $row['one_ef_brgy']
            ]);

            $pmhs = explode(' ', $row['one_pm_pmh']);
            $client->past_medical_history()
                ->whereNotIn('ONE_PM_PMH', $pmhs)
                ->delete();

            foreach ($pmhs as  $pmh) 
            {
                $client->past_medical_history()->updateOrCreate(['ONE_PM_PMH' => $pmh], [
                    'ONE_PM_PMH' => $pmh,
                ]);
            }

            $client->past_medical_spec()->updateOrCreate([], [
                'ONE_EF_ALLERGY' => $row['one_ef_allergy'],
                'ONE_EF_ORGANCANCER' => $row['one_ef_organcancer'],
                'ONE_EF_HEPATYPE' => $row['one_ef_hepatype'],
                'ONE_EF_HIGHESTSYSTOLIC' => $row['one_ef_highestsystolic'],
                'ONE_EF_HIGHESTDIASTOLIC' => $row['one_ef_highestdiastolic'],
                'ONE_EF_PULTUB' => $row['one_ef_pultub'],
                'ONE_EF_EXPULTUB' => $row['one_ef_expultub'],
                'ONE_EF_PMHOTHERS' => $row['one_ef_pmhothers']
            ]);

            $client->pmh_operation()->updateOrCreate([], [
                'ONE_EF_PSH' => $row['one_ef_psh'],
                'ONE_EF_DPSO' => $row['one_ef_dpso'],
                'ONE_EF_PSO' => $row['one_ef_pso'],
            ]);

            $fmhs = explode(' ', $row['one_fm_pmh']);
            $client->family_medical_history()
                ->whereNotIn('ONE_FM_PMH', $fmhs)
                ->delete();

            foreach ($fmhs as  $fmh) 
            {
                $client->family_medical_history()->updateOrCreate(['ONE_FM_PMH' => $fmh], [
                    'ONE_FM_PMH' => $fmh,
                ]);
            }

            $client->family_medical_spec()->updateOrCreate([], [
                'ONE_EF_FHALLERGY' => $row['one_ef_fhallergy'],
                'ONE_EF_FHORGANCANCER' => $row['one_ef_fhorgancancer'],
                'ONE_EF_FHHEPATYPE' => $row['one_ef_fhhepatype'],
                'ONE_EF_FHHIGHESTSYSTOLIC' => $row['one_ef_fhhighestsystolic'],
                'ONE_EF_FHHIGHESTDIASTOLIC' => $row['one_ef_fhhighestdiastolic'],
                'ONE_EF_FHPULTUB' => $row['one_ef_fhpultub'],
                'ONE_EF_FHEXPULTUB' => $row['one_ef_fhexpultub'],
                'ONE_EF_FHOTHERS' => $row['one_ef_fhothers'],
            ]);

            $client->fmh_operation()->updateOrCreate([], [
                'ONE_FO_FHSH' => $row['one_fo_fhsh'],
                'ONE_FO_DFSO' => $row['one_fo_dfso'],
                'ONE_FO_FSO' => $row['one_fo_fso'],
            ]);

            $client->Immu_Children()->updateOrCreate([], [
                'ONE_IC_IMMCHILD' => $row['one_ic_immchild'],
            ]);
            
            $client->immu_adult()->updateOrCreate([], [
                'ONE_IA_IMMADULT' => $row['one_ia_immadult'],
            ]);

            $client->social_history()->updateOrCreate([], [
                'ONE_EF_SMOKE' => $row['one_ef_smoke'],
                'ONE_EF_PACKS' => $row['one_ef_packs'],
                'ONE_EF_ALC' => $row['one_ef_alc'],
                'ONE_EF_BOT' => $row['one_ef_bot'],
                'ONE_EF_DRUGS' => $row['one_ef_drugs'],
                'ONE_EF_SEXACTIVE' => $row['one_ef_sexactive'],
                'ONE_EF_IMMUNO' => $row['one_ef_immuno'],
            ]);

            $client->immu_preg()->updateOrCreate([], [
                'ONE_IP_IMMPREG' => $row['one_ip_immpreg'],
            ]);

            $client->immu_eld()->updateOrCreate([], [
                'ONE_IE_IMMELD' => $row['one_ie_immeld']
            ]);

            $client->immothers()->updateOrCreate([], [
                'ONE_EF_IMMCHILDOTH' => $row['one_ef_bot'],
                'ONE_EF_IMMADULTOTH' => $row['one_ef_drugs'],
                'ONE_EF_IMMPREGOTH' => $row['one_ef_sexactive'],
                'ONE_EF_IMMUNO' => $row['one_ef_immuno'],
            ]);

            $client->fam_plan()->updateOrCreate([], [
                'ONE_EF_FPC' => $row['one_ef_fpc'],
            ]);

            $client->mens_history()->updateOrCreate([], [
                'ONE_EF_MENARCHE' => $row['one_ef_menarche'],
                'ONE_EF_MENARCHEAGE' => $row['one_ef_menarcheage'],
                'ONE_EF_ONSETSEX' => $row['one_ef_onsetsex'],
                'ONE_EF_MENOP' => $row['one_ef_menop'],
                'ONE_EF_MENOPAGE' => $row['one_ef_menopage'],
                'ONE_EF_MENSDAYS' => $row['one_ef_mensdays'],
                'ONE_EF_PADS' => $row['one_ef_pads'],
            ]);

            $client->birth_method()->updateOrCreate([], [
                'ONE_BC_BCM' => $row['one_bc_bcm'],
                'ONE_BC_CYCLE' => $row['one_bc_cycle'],
            ]);

            $client->preg_history()->updateOrCreate([], [
                'ONE_EF_LIVCHILD' => $row['one_ef_livchild'],
                'ONE_EF_ABORT' => $row['one_ef_abort'],
                'ONE_EF_PREMATURE' => $row['one_ef_premature'],
                'ONE_EF_FULLTERM' => $row['one_ef_fullterm'],
                'ONE_EF_DELIVERYTYPE' => $row['one_ef_deliverytype'],
                'ONE_EF_PARI' => $row['one_ef_pari'],
                'ONE_EF_GRAV' => $row['one_ef_grav'],
                'ONE_EF_ECLAMPSIA' => $row['one_ef_eclampsia'],
            ]);

            $client->ppef()->updateOrCreate([], [
                'ONE_EF_BPSYSTOLIC' => $row['one_ef_bpsystolic'],
                'ONE_EF_BPDIASTOLIC' => $row['one_ef_bpdiastolic'],
                'ONE_EF_WEIGHT' => $row['one_ef_weight'],
                'ONE_EF_HEIGHT' => $row['one_ef_height'],
                'ONE_EF_BMI' => $row['one_ef_bmi'],
                'ONE_EF_RESPRATE' => $row['one_ef_resprate'],
                'ONE_EF_VAL' => $row['one_ef_val'],
                'ONE_EF_VAR' => $row['one_ef_var'],
                'ONE_EF_TEMP' => $row['one_ef_temp'],
                'ONE_EF_LENGTH' => $row['one_ef_length'],
                'ONE_EF_HCIRCUM' => $row['one_ef_hcircum'],
                'ONE_EF_SKINFOLD' => $row['one_ef_skinfold'],
                'ONE_EF_WAIST' => $row['one_ef_waist'],
                'ONE_EF_MAUACIRCUM' => $row['one_ef_mauacircum'],
                'ONE_EF_HIP' => $row['one_ef_hip'],
                'ONE_EF_LIMBS' => $row['one_ef_limbs'],
                'ONE_EF_BLOODTYPE' => $row['one_ef_bloodtype'],
                'ONE_EF_AAA' => $row['one_ef_aaa'],
                'ONE_EF_AS' => $row['one_ef_as'],
            ]);

            $client->heent()->updateOrCreate([], [
                'ONE_HE_HEENT' => $row['one_he_heent'],
            ]);

            $client->cbl()->updateOrCreate([], [
                'ONE_PC_CBL' => $row['one_pc_cbl'],
            ]);

            $client->heart()->updateOrCreate([], [
                'ONE_PH_HEART' => $row['one_ph_heart'],
            ]);

            $client->abdomen()->updateOrCreate([], [
                'ONE_PA_ABDOMEN' => $row['one_pa_abdomen'],
            ]);

            $client->genitourinary()->updateOrCreate([], [
                'ONE_PG_GENIT' => $row['one_pg_genit'],
            ]);

            $client->dre()->updateOrCreate([], [
                'ONE_PD_RECTAL' => $row['one_pd_rectal'],
            ]);

            $client->skin()->updateOrCreate([], [
                'ONE_PS_SKIN' => $row['one_ps_skin'],
            ]);

            $client->neuro_exam()->updateOrCreate([], [
                'ONE_PN_NEURO' => $row['one_pn_neuro'],
            ]);

            $client->pfps_oth()->updateOrCreate([], [
                'ONE_EF_HEENTOTH' => $row['one_ef_heentoth'],
                'ONE_PC_CBLOTH' => $row['one_pc_cbloth'],
                'ONE_PH_HEARTOTH' => $row['one_ph_heartoth'],
                'ONE_PA_ABDOMENOTH' => $row['one_pa_abdomenoth'],
                'ONE_PG_GENITOTH' => $row['one_pg_genitoth'],
                'ONE_PD_RECTALOTH' => $row['one_pd_rectaloth'],
                'ONE_PS_SKINOTH' => $row['one_ps_skinoth'],
                'ONE_PN_NEUROOTH' => $row['one_pn_neurooth'],
            ]);

            $client->ncd_hra()->updateOrCreate([], [
                'ONE_EF_FATFOOD' => $row['one_ef_fatfood'],
                'ONE_EF_VEG' => $row['one_ef_veg'],
                'ONE_EF_FRUIT' => $row['one_ef_fruit'],
                'ONE_EF_PHYACTIV' => $row['one_ef_phyactiv'],
                'ONE_EF_DIABETES' => $row['one_ef_diabetes'],
                'ONE_EF_DIABETESYES' => $row['one_ef_diabetesyes'],
                'ONE_EF_SYMPTOMS' => $row['one_ef_symptoms'],
                'ONE_EF_RBG' => $row['one_ef_rbg'],
                'ONE_EF_FBSRBS' => $row['one_ef_fbsrbs'],
                'ONE_EF_RBGL' => $row['one_ef_rbgl'],
                'ONE_EF_RBGDATE' => $row['one_ef_rbgdate'],
                'ONE_EF_RBL' => $row['one_ef_rbl'],
                'ONE_EF_RBLDATE' => $row['one_ef_rbldate'],
                'ONE_EF_CHOLESTEROL' => $row['one_ef_cholesterol'],
                'ONE_EF_KETONESPRES' => $row['one_ef_ketonespres'],
                'ONE_EF_KETONES' => $row['one_ef_ketones'],
                'ONE_EF_KETONESDATE' => $row['one_ef_ketonesdate'],
                'ONE_EF_PROTEINPRES' => $row['one_ef_proteinpres'],
                'ONE_EF_PROTEIN' => $row['one_ef_protein'],
                'ONE_EF_PROTEINDATE' => $row['one_ef_proteindate'],
                'ONE_EF_AHA' => $row['one_ef_aha'],
                'ONE_EF_CHESTPAIN' => $row['one_ef_chestpain'],
                'ONE_EF_CENTERPAIN' => $row['one_ef_centerpain'],
                'ONE_EF_WALKING' => $row['one_ef_walking'],
                'ONE_EF_TONGUE' => $row['one_ef_tongue'],
                'ONE_EF_10M' => $row['one_ef_10m'],
                'ONE_EF_CHESTFRONT' => $row['one_ef_chestfront'],
                'ONE_EF_SATIA' => $row['one_ef_satia'],
                'ONE_EF_DIFF' => $row['one_ef_diff'],
                'ONE_EF_RISK' => $row['one_ef_risk'],
            ]);
        }
    }
}
