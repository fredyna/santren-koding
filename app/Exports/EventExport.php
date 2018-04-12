<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventExport implements FromCollection {
public function collection()
{
  return \App\Event::all();
}
}
