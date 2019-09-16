{{--
  all instances of $users is refering to the supplier
  --}}

@extends('layouts.app')

@section('title', $title)

@section('content')

<h3>Click to open menu</h3>

<div class="flexCon">

  @foreach ($users as $user)
  <div class="col-25 mb">

    <div class="product bdr">
      {{-- <img src="{{$user->image}}" alt="{{ $user->name }}"> --}}
      <div class="pxy">
        <a href="/suppliers/{{ $user->id }}/products">{{ $user->name }}</a>
      </div>
    </div>
  </div>
  @endforeach

</div>

@endsection