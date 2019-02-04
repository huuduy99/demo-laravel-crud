<?php

namespace App\Http\Controllers;


use App\Imports\ProvinceImport;
use Maatwebsite\Excel\Facades\Excel;

class RawAddressController extends Controller
{
    public function export()
    {
        return Excel::download(new ProvinceImport(), storage_path() . '/a2018.xls');
    }

    public function index()
    {
        $this->import();
    }

    public function import()
    {
        Excel::import(new ProvinceImport, 'a2018.xls');
    }
}
