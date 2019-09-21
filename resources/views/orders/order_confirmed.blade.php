@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>

@if (session('message'))

<div class="bx dark">

  {{ session('message') }}

</div>

@endif

@if (session('finalOrderDetails'))

<h4>Order ID: ...</h4>
<div class="bx">
  <div class="bx-title mb">Delivery Address</div>
  <strong>{{ Auth::user()->name }} <br></strong>
  {{ Auth::user()->address->street_num }}
  {{ Auth::user()->address->street }} <br>
  {{ Auth::user()->address->suburb }} <br>
  {{ Auth::user()->address->state }}
  {{ Auth::user()->address->postcode }}
</div>

{{-- unserialize cart flash object --}}
@php $cart = unserialize(session('finalOrderDetails')); @endphp

{{-- {{dd($cart)}} --}}
@foreach ($cart->items as $product)

<div class="bx">
  <div class="flexCon">
    <div class="px-sm mr-lg">
      <img class="h100" src="{{ asset('storage/uploads/product_images/' . $product['item']['image'] ) }}" alt="{{ $product['item']['image'] }}">
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

{{-- if there is no cart redirect to suppliers --}}
<script>
  window.location = "/suppliers";
</script>

@endif



@endsection
