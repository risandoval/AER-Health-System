<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\PastMedicalHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            $client = Client::updateOrCreate(['ONE_EF_PIN' => $row['one_ef_pin']], [
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

            foreach ($pmhs as $key => $pmh) 
            {
                // dd($key);
                $client->past_medical_history()->updateOrCreate(['ONE_PM_PMH' => $pmh], [
                    'ONE_PM_PMH' => $pmh,
                ]);
            }
        }
    }
}
