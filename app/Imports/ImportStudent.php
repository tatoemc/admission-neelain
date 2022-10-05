<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;



class ImportStudent implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Student([
           'year'     => $row[0],
           'f_name'    => $row[1], 
           's_name'     => $row[2],
           't_name'    => $row[3], 
           'fo_name'     => $row[4],
           'admission_type'    => $row[5], 
           'study_type'    => $row[6], 
           'country'     => $row[7],
           'certificate_id'  => $row[8], 
           'date_certificate' => $row[9],
        ]);


    }


}
