<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\RawAddressController;

class RawAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rawAddressController = new RawAddressController();
        $rawAddressController->import();
    }
}
