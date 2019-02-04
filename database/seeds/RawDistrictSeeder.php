<?php

use Illuminate\Database\Seeder;

class RawDistrictSeeder extends Seeder
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

            $province = DB::table('raw_province')->where('name', '=', $address->name)->first();
            if ($province) {
                $raw_district = DB::table('raw_district')->where('name', '=', $address->district)->first();
                if ($raw_district == null) {
                    DB::table('raw_district')->insert([
                        'name' => $address->district,
                        'code' => $address->code,
                        'lat' => -1,
                        'lng' => -1,
                        'id_province' => $province->id,
                    ]);
                }
            }
        });
    }
}
