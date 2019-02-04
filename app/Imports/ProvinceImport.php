<?php

namespace App\Imports;

use App\Province;
//use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class ProvinceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $province = new Province();
        $province->name = $row[0];
        $province->code = $row[1];
        $province->district = $row[2];
        $province->district_code = $row[3];
        $province->ward = $row[4];
        $province->ward_code = $row[5];
        $province->grade = $row[6];


        $province->save();

        return $province;
    }

    public function collection(Collection $rows)
    {
        $count = 0;
        foreach ($rows as $row) {
            $province = new Province();
            $province->name = $row[0];
            $province->code = $row[1];
            $province->district = $row[2];
            $province->district_code = $row[3];
            $province->ward = $row[4];
            $province->ward_code = $row[5];
            $province->grade = $row[6];

            Log::info($province->name);
            $province->save();
            $count++;
            if ($count >= 10) {
                break;
            }
        }
    }
}
