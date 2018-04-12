
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
        <h1 class="text-center">U S E R</h1>
            <a class="btn btn-md btn-success" href="/admin/users/create" >Tambah User</a><br><br>
        <table class="table">
            <tr>
              <td>No</td>
              <td>Nama User</td>
              <td>Email User</td>
              <td>Action</td>
            </tr>
            @php
              $no = 1;
            @endphp
            @foreach($users as $u)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>
                    <form action="users/{{$u->id}}" method="post">
                      {{csrf_field()}}
                      @method('GET')
                      <button type="button" onclick="location.href='users/{{$u->id}}/edit/'" class="btn btn-sm btn-primary" name="button"> <i class="fa fa-pencil"></i> Edit</button>
                      <button type="submit" class="btn btn-sm btn-danger" name="button" onclick="confirm('Yakin ingin menghapus ?')"> <i class="fa fa-trash"></i> Hapus</button>
                    </form>
                </td>
              </tr>
            @endforeach
        </table>
    </div>
@endsection
