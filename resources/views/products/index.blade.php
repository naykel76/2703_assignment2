@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{$title}}</h1>

<div id="product-grid" class="flexCon">

  @forelse ($products as $item)

  <div class="col-25 mb">

    <div class="product bdr">

      <img src="{{$item->image}}" alt="{{ $item->name }}">

      <div class="pxy">

        <a href="/products/{{ $item->id }}">{{ $item->name}}</a>

        <div class="price">{{ $item->price }}</div>

        <div class="btn-primary">Add To Cart</div>

      </div>

    </div>

  </div>

  @empty

  <h5>There are no dishes available from this restaurant</h5>

  @endforelse

</div>

{{$products->links()}}

@endsection
