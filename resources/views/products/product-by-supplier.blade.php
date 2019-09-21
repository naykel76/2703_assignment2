@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $supplier->name }} Menu</h1>

@if (Session::has('cart'))


<div class="bx">

  <ul class="lst">

    @foreach (Session::get('cart')->items as $product)

    <li>

      <a href="{{ route('products.reduce', $product['item']['id']) }}">
        <svg class="icon-minus">
          <use xlink:href="/svg/icons.svg#icon-minus-circle"></use>
        </svg>
      </a>

      <input type="text" value="{{$product['qty']}}" style="width: 50px;" class="txt-ctr mx" disabled>

      <a href="{{ route('products.increase', $product['item']['id']) }}">
        <svg class="icon-plus mr-lg">
          <use xlink:href="/svg/icons.svg#icon-plus-circle"></use>
        </svg>
      </a>

      <span class="mr">{{$product['item']['name']}}</span><span>${{number_format($product['item']['price'], 2)}} ea</span>

      <a href="{{ route('products.remove', $product['item']['id']) }}" class="txt-red ml-lg">
        {{-- <svg class="icon-cross txt-red ml-lg">
        <use xlink:href="/svg/icons.svg#icon-cross-circle"></use>
      </svg> --}}
        Remove Item
      </a>

      <hr>

      @endforeach

      Items: {{ Session('cart')->totalQty }} <br>

      <h5>Total Price: ${{ number_format(Session('cart')->totalPrice, 2) }}</h5>

      <br>

      <form method="POST" action="{{ route('orders.store') }}">

        @csrf

        <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>

        <input type="submit" class="btn-primary" value="Checkout">

      </form>

  </ul>

</div>

@else

No Items in Cart

@endif

<style>
  .product img {
    height: 150px;
  }
</style>

<div id="product-grid" class="row">

  @forelse ($products as $product)

  <div class="col-25 mb">

    <div class="product bdr mt">

      <div class="txt-ctr">
        <img src="{{ asset('storage/uploads/product_images/' . $product->image ) }}" alt="{{ $product->image }}">
      </div>

      <div class="pxy">

        <h4>{{ $product->name}}</h4>

        <h5 class="price">$ {{ number_format($product->price, 2, '.', ',') }}</h5>

        <br>

        {{-- must be authorized else error --}}
        @auth

        {{-- if the authenticated user is a user (consumer) display add to cart form --}}
        @if (Auth::user()->hasRole('user'))

        <form action="{{ route('products.addCart', $product->id ) }}" method="POST">

          @csrf

          <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>

          @component('components.submit', [ 'button_text' => 'Add Dish'])@endcomponent

        </form>

        @endif

        @endauth

      </div>

    </div>

  </div>

  @empty

  <h5>There are no dishes available from this restaurant</h5>

  @endforelse

</div>

{{$products->links()}}

@endsection
