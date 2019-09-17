@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="bx-danger">Change this to a simple home page. Users must click on restaurants to place order.
  <br>
  how to deal (prevent) with orders from multiple locations
</div>

<img src="/images/item_05.jpg">
{{--
<div class="flexCon">

  @foreach ($products as $item)

  <div class="col-25 mb">

    <div class="product bdr">

      <img src="{{ asset('storage/uploads/product_images/' . $item->image ) }}" alt="{{ $item->image }}">

<div class="pxy">

  <a href="">{{ $item->name }}</a>

  <div class="price">{{ $item->price }}</div>

  <div class="btn-primary">Add To Cart</div>

</div>

</div>

</div>

@endforeach

</div>

{{$products->links()}} --}}

@endsection
