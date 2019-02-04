<?php

namespace App\Imports;

use App\RawAddress;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;


class ProvinceImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $province = new RawAddress();
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

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // TODO: Implement collection() method.
        $count = 0;
        foreach ($collection as $row) {
            if ($count > 0) {
                $province = new RawAddress();
                $province->name = $row[0];
                $province->code = $row[1];
                $province->district = $row[2];
                $province->district_code = $row[3];
                $province->ward = $row[4];
                $province->ward_code = $row[5];
                $province->grade = $row[6];
                $province->save();
            }
            $count++;
        }
        Log::alert("done import xls!");
    }
}
