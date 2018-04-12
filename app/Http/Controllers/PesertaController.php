<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function index(){
        $event = \App\Event::get();
        return view('admin.peserta.index')->with('event',$event);
    }
    public function view($id){
        $peserta = DB::table('pesertas')
                        ->select('pesertas.*','users.id as id_user','users.name as name','users.email as email','events.id as id_event','events.nama as nama')
                        ->join('users','pesertas.user_id', '=', 'users.id')
                        ->where('event_id', $id)
                        ->join('events','pesertas.event_id','=','events.id')
                        ->get();
        return view('admin.peserta.peserta')->with('peserta',$peserta);
    }
    public function destroy($id){
      $peserta = \App\Peserta::find($id);
      $peserta->delete();
      return redirect()->back();
    }
}
