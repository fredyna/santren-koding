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
User
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">P E S E R T A</h1>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Event</th>
      <th>Opsi</th>
    </tr>
    @php
      $no = 1;
    @endphp
    @foreach ($peserta as $p)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$p->nama}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->nama}}</td>
        <td>
          <form action="/admin/peserta/{{$p->id}}" method="post">
            {{csrf_field()}}
            <button type="submit" class="btn btn-sm btn-danger" name="submit"> <i class="fa fa-trash"></i> Hapus</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
</div>
@endsection
