<?php

namespace App\Imports;

use App\Models\EmployeeModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use DB;
  
class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id = EmployeeModel::insertGetId(
            [
                'title'         => $row['title'],
                'name_kh'       => $row['name_kh'], 
                'name_en'       => $row['name_en'],
                'phone1'        => $row['phone1'],
                'phone2'        => $row['phone2'],
                'department'    => $row['department'],
                'position'      => $row['position'],
                'part_of'       => $row['part_of'],
                'member'        => $row['member'],
                'created_by'    => auth()->user()->id
            ]
            );
        return EmployeeModel::find($id);
    }
}
