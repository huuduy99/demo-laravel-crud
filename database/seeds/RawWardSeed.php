<?php

use Illuminate\Database\Seeder;

class RawWardSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rawAddress = \App\RawAddress::all();
        $rawAddress->each(function ($address) {

            $district = DB::table('raw_district')->where('name', '=', $address->district)->first();
            $type = DB::table('raw_child_district_type')->where('name', '=', $address->grade)->first();

            if ($district != null && $type != null) {
                $raw_ward = DB::table('raw_ward')->where('name', '=', $address->district)->first();

                if ($raw_ward == null) {
                    DB::table('raw_ward')->insert([
                        'name' => $address->district,
                        'code' => $address->code,
                        'lat' => -1,
                        'lng' => -1,
                        'id_district' => $district->id,
                        'id_type_raw_child_district' => $type->id,
                    ]);
                }
            }
        });
    }
}
