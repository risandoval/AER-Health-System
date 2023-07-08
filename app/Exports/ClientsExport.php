<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ClientsExport implements ShouldAutoSize, FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Client::select(
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
        )->get();
    }

    public function headings(): array
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
        ];
    }
}