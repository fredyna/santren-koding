<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Exports\EventExport;
use \App\Exports\DataExport;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function eventpdf(){
      $pdf = PDF::loadView('admin.event.laporan');
      return $pdf->download('event.pdf');
    }
    public function eventexcel(){
      return Excel::download(new DataExport('\App\Peserta'), 'namanya.xlsx');
    }
}
