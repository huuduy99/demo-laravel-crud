<?php

use Illuminate\Database\Seeder;

class RawChildDistrictTypeSeeder extends Seeder
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
        $rawAddress->each(function ($item) {

            $row = DB::table('raw_child_district_type')->where('name', '=', $item->grade)->first();
            if ($row == null) {
                DB::table('raw_child_district_type')->insert([
                    'name' => $item->grade,
                ]);
            }
        });
    }
}
