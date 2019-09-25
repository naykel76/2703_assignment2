@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<div class="row">

  @foreach ($products as $product)

  <div class="bx flexCon">
    <div class="col-25">
      <img src="{{ asset('storage/' . App\Product::find($product->product_id)->image ) }}" alt="{{ App\Product::find($product->product_id)->image }}">
    </div>
    <div class="col">
      <h5>{{ App\Product::find($product->product_id)->name }}</h5>
      <strong>Qty Sold: </strong> {{ $product->qty }}
    </div>
  </div>

  <hr>



  @endforeach

</div>

@endsection

{{--
<div class="col-50">


  <div class="product-item">

    <div class="txt-ctr">

      <img src="{{ asset('storage/' . App\Product::find($product->product_id)->image ) }}" alt="{{ App\Product::find($product->product_id)->image }}">

</div>

<div class="pxy">

  <h5>{{ App\Product::find($product->product_id)->name }}</h5>
  <strong>Qty Sold: </strong> {{ $product->qty }}

  <br>

</div>

</div>

</div> --}}
