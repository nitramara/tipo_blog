<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Imports\RegistrosImport;
use Maatwebsite\Excel\Facades\Excel;

class RegistroController extends Controller
{
    public function exportpdf()
    {
        return 'Exportacion PDF';
    }
    //para expport EXCEL
    /* public function exportToXlsx()   
    {
      return Excel::download(new registroExport, 'registro.xlsx');
    } */
    
    public function import()
    {
        return view('iivewire.import');
    }
    public function importData(Request $request)
    {
        Excel::import(new RegistrosImport, request()->file ('excel'));
        return redirect()->to(url('registros'));
    }
}
