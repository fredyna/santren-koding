@extends('layouts.lte')
@section('css')
  <style>

    .container{
      background: white;
      border-radius: 4px;
    }
  </style>
@endsection
@section('header')
    Event
@endsection
@section('content')
    <div class="container p-4">
        <h1 class="text-center">E V E N T</h1>
        <div class="btn-group" role="group" aria-label="...">
          <button type="button" class="btn btn-success btn-md" onclick="location.href='event/create'">Tambah Event</button>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Laporan
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="event/pdf">PDF</a></li>
              <li><a href="event/excel">Excel</a></li>
            </ul>
      </div>
    </div>
        <br><br>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kuota</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Opsi</th>
            </tr>
            @php
              $no = 1;
            @endphp
            @foreach ($events as $e)
              <tr>
                  <td>{{$no++}}</td>
                  <td>{{$e->nama}}</td>
                  <td>{{$e->kuota}}</td>
                  <td>{{$e->keterangan}}</td>
                  <td><img src="../upload/{{$e->foto}}" width="100px"></td>
                  <td>{{date('d-m-Y',strtotime($e->mulai))}}</td>
                  <td>{{date('d-m-Y',strtotime($e->selesai))}}</td>
                  <td>
                      <form action="event/{{$e->id}}" class="row" method="post">
                          {{csrf_field()}}
                          <button type="button" class="btn btn-sm btn-primary" name="button" onclick="location.href='event/{{$e->id}}/edit'"><i class="fa fa-pencil"></i> Edit</button>
                          <button type="submit" class="btn btn-sm btn-danger" name="submit"><i class="fa fa-trash"></i> Hapus</button>
                      </form>
                  </td>
              </tr>
            @endforeach

        </table>
    </div>
@endsection
