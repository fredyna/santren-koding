<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserIndexController extends Controller
{
    public function index(){
        $event = \App\Event::get();
        //dd($event);
        return view('welcome')->with('event',$event);
    }
    public function event(){
      $event = \App\Event::get();
        return view('events.event')->with('event',$event);
    }
    public function myevent(){
      $user_id = Auth::user()->id;
      $myevent = DB::table('pesertas')
                    ->select('events.*', 'pesertas.id as peserta_id')
                    ->join('events','pesertas.event_id','=','events.id')
                    ->where('user_id',$user_id)
                    ->get();
      return view('events.myevent')->with('myevent',$myevent);
    }
    public function detailevent($id){
        $user_id = Auth::user()->id;
        $data['event'] = \App\Event::find($id);
        $data['peserta'] = \App\Peserta::where('event_id',$id)->get();
        $data['ket'] = \App\Peserta::where('user_id', $user_id)
                                ->where('event_id', $id)->get();
        return view('events.detailevent')->with($data);
    }
    public function daftar($id){
      $peserta = new \App\Peserta;
      $peserta->user_id = Auth::user()->id;
      $peserta->event_id = $id;
      $peserta->save();

      return redirect()->back();
    }
    public function destroy($id){
      $peserta = \App\Peserta::find($id);
      $peserta->delete();
      return redirect()->back();
    }

}
