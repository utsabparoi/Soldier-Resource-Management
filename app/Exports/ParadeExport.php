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
        $parades = ParadeModel::query()
            ->withCount(['camp as camp' =>fn($q) => $q->select('name')])
            ->get()
            ->map(function($item){
                return [
                    'name'                       => $item->name,
                    'camp'                       => $item->camp,
                    'next_rank'                  => $item->next_rank,
                    'join_date_present_unit'     => $item->join_date_present_unit,
                    'enrolment_date'             => $item->enrolment_date,
                    'present_rank_date'          => $item->present_rank_date,
                    'retirement_date'            => $item->retirement_date,
                    'permanent_address'          => $item->permanent_address,
                    'marital_status'             => $item->marital_status,
                    'children_number'            => $item->children_number,
                    'created_at'                 => $item->created_at,
                    'updated_at'                 => $item->updated_at,
                ];
            })
            ->toArray();
        return collect($parades);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Camp',
            'Rank',
            'Joining Date',
            'Enrolment Date',
            'Present Rank Date',
            'Retirement Date',
            'Permanent Address',
            'Marital Status',
            'Total Children',
            'Created Date',
            'Updated',
        ];
    }
}
