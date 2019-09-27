@extends('layouts.app')

@section('title', $title)

@section('content')

<h1 class="mb-md">{{ $supplierName }} Menu</h1>

<style>
  .product img {
    height: 150px;
  }
</style>

@if (Session('message'))

<div class="bx danger">

  {{ Session('message')}}

</div>

@endif

<div id="product-grid" class="row">

  @forelse ($products as $product)

  <div class="col-50">

    <div class="bdr mb">

      <div class="flexCon">

        <div class="col">

          <img src="{{ asset('storage/' . $product->image ) }}" alt="{{ $product->image }}" height="200">

        </div>

        <div class="col">

          <div class="pxy">

            <h5>{{ $product->name}}</h5>

            <h4 class="price my-sm">$ {{ number_format($product->price, 2, '.', ',') }}</h4>

            <div class="mt">

              {{-- guest or user display add to cart --}}
              @if (!Auth::User() || Auth::user()->hasRole('user'))

              <form action="{{ route('products.addCart', $product->id ) }}" method="POST">

                @csrf

                <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>

                @component('components.submit', [ 'button_text' => 'Add To Cart'])@endcomponent

              </form>

              @endif

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  @empty

  <h5>There are no dishes available from this restaurant</h5>

  @endforelse

</div>

{{$products->links()}}

@endsection
