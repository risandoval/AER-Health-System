<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport extends DefaultValueBinder implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function headings() :array 
    {
        return 
        [
            [
                'username',
                'first_name',
                'middle_name',
                'last_name',
                'role',
                'specialization',
                'barangay',
                'birthday',
                'contact',
                'email', 
                'status',
                'created_at',
                'updated_at'
            ]
        ];
    }  

    public function collection()
    {
        return User::select(
            'username',
            'first_name',
            'middle_name',
            'last_name',
            'role',
            'specialization',
            'barangay',
            'birthday',
            'contact',
            'email', 
            'status',
            'created_at',
            'updated_at'
        )->get();
    }
}
