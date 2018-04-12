@extends('layouts.master')
@section('css')
    <style>
        .card:hover{
            box-shadow: 5px 3px 10px grey;
        }
    </style>
@endsection
@section('header')
@endsection
@section('content')
<div class="container  text-center">
  <br>
  <h2>Daily Events</h2>
  <p>Event yang diadakan Santren Koding</p>
    <div class="row">
      @foreach ($event as $e)
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card" >
                <img class="card-img-top" src="{{URL::asset('upload/'.$e->foto)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$e->nama}}</h5>
                    <p class="card-text">{{$e->keterangan}}</p>
                    <a href="/users/{{$e->id}}/detailevent" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
      @endforeach
    </div>
</div><br>
@endsection
@section('js')
@endsection
