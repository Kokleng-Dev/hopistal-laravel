<?php

namespace App\Exports;

use App\Models\EmployeeModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmployeeModel::select(
            'title', 
            'name_kh', 
            'name_en', 
            'phone1', 
            'phone2', 
            'department', 
            'position', 
            'part_of',
            'member', 
            'other')
        ->where('created_by', auth()->user()->id)
        ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Title","Name_KH", "Name_En","Phone1","Phone2","Department","Position","Part_of","Member","Other"];
    }
}
