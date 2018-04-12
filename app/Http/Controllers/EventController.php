<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    public function index(){
      $events = \App\Event::get();
        return view('admin.event.index')->with('events', $events);
    }

    public function create(){
        return view('admin.event.create');
    }

    public function edit($id){
      $event = \App\Event::find($id);
        return view('admin.event.edit')->with('event',$event);
    }

    public function store(Request $request){
      $nama       = $request->nama;
      $kuota      = $request->kuota;
      $deskripsi  = $request->deskripsi;
      $keterangan = $request->keterangan;
      $mulai      = $request->mulai;
      $selesai    = $request->selesai;

      if(Input::hasFile('file')){
        $file = input::file('file');
        $file->move('upload', $file->getClientOriginalName());
      }

      $event = new \App\Event;
      $event->nama        = $nama;
      $event->foto        = $file->getClientOriginalName();
      $event->kuota       = $kuota;
      $event->deskripsi   = $deskripsi;
      $event->keterangan  = $keterangan;
      $event->mulai       = $mulai;
      $event->selesai     = $selesai;
      $event->save();
      return redirect('/admin/event');
    }
    public function update(Request $request, $id){
      $nama       = $request->nama;
      $kuota      = $request->kuota;
      $deskripsi  = $request->deskripsi;
      $keterangan = $request->keterangan;
      $mulai      = $request->mulai;
      $selesai    = $request->selesai;

      if(Input::hasFile('foto')){
        $file = input::file('foto');
        $file->move('upload', $file->getClientOriginalName());
      }

      $event = \App\Event::find($id);
      $event->nama        = $nama;
      $event->foto        = $file->getClientOriginalName();
      $event->kuota       = $kuota;
      $event->deskripsi   = $deskripsi;
      $event->keterangan  = $keterangan;
      $event->mulai       = $mulai;
      $event->selesai     = $selesai;
      $event->save();
      return redirect('/admin/event');
    }

    public function destroy($id){
      $event = \App\Event::find($id);
      $event->delete();
      return redirect('/admin/event');
    }
}
