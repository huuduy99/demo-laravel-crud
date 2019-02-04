<?php

use Illuminate\Database\Seeder;

class RawProvinceSeeder extends Seeder
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

            $row = DB::table('raw_province')->where('name', '=', $item->name)->first();
            if ($row == null) {
                DB::table('raw_province')->insert([
                    'name' => $item->name,
                    'code' => $item->code,
                    'lat' => -1,
                    'lng' => -1,
                ]);
            }
        });
    }
}
