@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>


@if (session('message'))

<div class="bx success">

  {{ session('message') }}

</div>

@endif


@if (session('confirmedOrderDetails'))

<div class="bx">
  <div class="bx-title mb">Deliver To:</div>
  <strong>{{ Auth::user()->name }} <br></strong>
  {{ Auth::user()->street_num }}
  {{ Auth::user()->street }} <br>
  {{ Auth::user()->suburb }} <br>
  {{ Auth::user()->state }}
  {{ Auth::user()->postcode }}
</div>

{{-- unserialize cart flash object --}}
@php $cart = unserialize(session('confirmedOrderDetails')); @endphp

{{-- {{dd($cart)}} --}}
@foreach ($cart->items as $product)

<div class="bx">

  <div class="flexCon">

    <div class="px-sm mr-lg">

      <img class="h100" src="{{ asset('storage/' . $product['item']['image'] ) }}" alt="{{ $product['item']['image'] }}">

    </div>

    <div class="grow">

      <h4> {{$product['item']['name']}}</h4>

      <h5>{{$product['qty']}} x ${{  number_format($product['item']['price'], 2) }} each</h5>

    </div>

  </div>

</div>

@endforeach

<div class="txt-r">

  <h4>Order Total: ${{ $cart->totalPrice }}</h4>

</div>

@else

{{-- if there is no cart redirect to home --}}
<script>
  window.location = "/";
</script>

@endif



@endsection
