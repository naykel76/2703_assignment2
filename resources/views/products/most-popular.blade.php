@extends('layouts.app')

@section('title', $title)


@section('content')

<div class="px-xl">

  <h1>{{ $title }}</h1>

  @foreach ($products as $product)

  <div class="bdr mb">

    <div class="flexCon">

      <div class="grow">

        <img src="{{ asset('storage/' . App\Product::find($product->product_id)->image ) }}" height="200" alt="{{ App\Product::find($product->product_id)->image }}">

      </div>


      <div class="pxy-lg">
        <h5>{{ App\Product::find($product->product_id)->name }}</h5>

        <strong>Qty Sold: </strong> {{ $product->qty }}
      </div>


    </div>

  </div>

  @endforeach

</div>

@endsection
