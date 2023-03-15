<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Module\PRM\Models\Camp;
use Module\PRM\Models\ParadeModel;



class ParadeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $parades = ParadeModel::select('name',
            'present_location', 'join_date_present_unit',
            'enrolment_date', 'present_rank_date', 'retirement_date',
            'next_rank', 'permanent_address', 'marital_status',
            'children_number', 'created_at', 'updated_at', 'name')
            ->get()
            ->toArray();
        return collect($parades);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Camp',
            'Joining Date',
            'Enrolment Date',
            'Present Rank Date',
            'Retirement Date',
            'Rank',
            'Permanent Address',
            'Marital Status',
            'Total Children',
            'Created Date',
            'Updated',
        ];
    }
}
