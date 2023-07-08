<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CSVTemplateExport implements ShouldAutoSize, WithHeadings
{

    public function headings (): array
    {
        return [
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
            'ONE_PM_PMH',
            'ONE_EF_ALLERGY',
            'ONE_EF_ORGANCANCER',
            'ONE_EF_HEPATYPE',
            'ONE_EF_HIGHESTSYSTOLIC',
            'ONE_EF_HIGHESTDIASTOLIC',
            'ONE_EF_PULTUB',
            'ONE_EF_EXPULTUB',
            'ONE_EF_PMHOTHERS',
            'ONE_EF_PSH',
            'ONE_EF_DPSO',
            'ONE_EF_PSO',
            'ONE_FM_PMH',
            'ONE_EF_FHALLERGY',
            'ONE_EF_FHORGANCANCER',
            'ONE_EF_FHHEPATYPE',
            'ONE_EF_FHHIGH',
            'ONE_EF_FHHIGHESTSYSTOLIC',
            'ONE_EF_FHHIGHESTDIASTOLIC',
            'ONE_EF_FHPULTUB',
            'ONE_EF_FHEXPULTUB',
            'ONE_EF_FHOTHERS',
            'ONE_FO_FHSH',
            'ONE_FO_DFSO',
            'ONE_FO_FSO',
            'ONE_IC_IMMCHILD',
            'ONE_IA_IMMADULT',
            'ONE_EF_SMOKE',
            'ONE_EF_PACKS',
            'ONE_EF_ALC',
            'ONE_EF_BOT',
            'ONE_EF_DRUGS',
            'ONE_EF_SEXACTIVE',
            'ONE_EF_IMMUNO',
            'ONE_IP_IMMPREG',
            'ONE_IE_IMMELD',
            'ONE_EF_IMMCHILDOTH',
            'ONE_EF_IMMADULTOTH',
            'ONE_EF_IMMPREGOTH',
            'ONE_EF_IMMELDOTH',
            'ONE_EF_FPC',
            'ONE_EF_MENARCHE',
            'ONE_EF_MENARCHEAGE',
            'ONE_EF_ONSETSEX',
            'ONE_EF_MENOP',
            'ONE_EF_MENOPAGE',
            'ONE_EF_MENSDAYS',
            'ONE_EF_PADS',
            'ONE_BC_BCM',
            'ONE_BC_CYCLE',
            'ONE_EF_LIVCHILD',
            'ONE_EF_ABORT',
            'ONE_EF_PREMATURE',
            'ONE_EF_FULLTERM',
            'ONE_EF_DELIVERYTYPE',
            'ONE_EF_PARI',
            'ONE_EF_GRAV',
            'ONE_EF_ECLAMPSIA',
            'ONE_EF_BPSYSTOLIC',
            'ONE_EF_BPDIASTOLIC',
            'ONE_EF_WEIGHT',
            'ONE_EF_HEIGHT',
            'ONE_EF_BMI',
            'ONE_EF_RESPRATE',
            'ONE_EF_VAL',
            'ONE_EF_VAR',
            'ONE_EF_TEMP',
            'ONE_EF_LENGTH',
            'ONE_EF_HCIRCUM',
            'ONE_EF_SKINFOLD',
            'ONE_EF_WAIST',
            'ONE_EF_MAUACIRCUM',
            'ONE_EF_HIP',
            'ONE_EF_LIMBS',
            'ONE_EF_BLOODTYPE',
            'ONE_EF_AAA',
            'ONE_EF_AS',
            'ONE_HE_HEENT',
            'ONE_PC_CBL',
            'ONE_PH_HEART',
            'ONE_PA_ABDOMEN',
            'ONE_PG_GENIT',
            'ONE_PD_RECTAL',
            'ONE_PS_SKIN',
            'ONE_PN_NEURO',
            'ONE_EF_HEENTOTH',
            'ONE_PC_CBLOTH',
            'ONE_PH_HEARTOTH',
            'ONE_PA_ABDOMENOTH',
            'ONE_PG_GENITOTH',
            'ONE_PD_RECTALOTH',
            'ONE_PS_SKINOTH',
            'ONE_PN_NEUROOTH',
            'ONE_EF_FATFOOD',
            'ONE_EF_VEG',
            'ONE_EF_FRUIT',
            'ONE_EF_PHYACTIV',
            'ONE_EF_DIABETES',
            'ONE_EF_DIABETESYES',
            'ONE_EF_SYMPTOMS',
            'ONE_EF_RBG',
            'ONE_EF_FBSRBS',
            'ONE_EF_RBGL',
            'ONE_EF_RBGDATE',
            'ONE_EF_RBL',
            'ONE_EF_RBLDATE',
            'ONE_EF_CHOLESTEROL',
            'ONE_EF_KETONESPRES',
            'ONE_EF_KETONES',
            'ONE_EF_KETONESDATE',
            'ONE_EF_PROTEINPRES',
            'ONE_EF_PROTEIN',
            'ONE_EF_PROTEINDATE',
            'ONE_EF_AHA',
            'ONE_EF_CHESTPAIN',
            'ONE_EF_CENTERPAIN',
            'ONE_EF_UPHILL',
            'ONE_EF_WALKING',
            'ONE_EF_TONGUE',
            'ONE_EF_10M',
            'ONE_EF_CHESTFRONT',
            'ONE_EF_SATIA',
            'ONE_EF_DIFF',
            'ONE_EF_RISK',
        ];
    }
}