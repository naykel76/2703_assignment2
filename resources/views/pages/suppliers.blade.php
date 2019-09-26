@extends('layouts.app')

@section('title', $title)

@section('content')

<h3>Restaurants</h3>

<div class="row">

  @foreach ($suppliers as $supplier)

  <div class="col-33 mb">

    <div class="product bdr txt-ctr">

      <a href="/restaurants/{{ $supplier->id }}/products">

        <div class="pxy-sm">

          @if ($supplier->image)

          <img src="{{ $supplier->image }}">
          @else

          <img src="https://picsum.photos/id/{{ rand(10, 200) }}/400">
          @endif


          <h4>{{ App\User::find($supplier->user_id)['name'] }}</h4>

        </div>

      </a>

    </div>

  </div>

  @endforeach

</div>

@endsection
