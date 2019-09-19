@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $supplier->name }} Menu</h1>

{{-- @if (Session::has('cart'))

<ul class="lst">
  @foreach (Session::get('cart') as $item)

  <li><span><strong>Product:</strong> {{$item['name']}}</span> &nbsp; &nbsp;
<span><strong>Qty</strong> {{$item['qty']}}</span> &nbsp; &nbsp;<span><strong>Price:</strong> {{$item['price']}}</span></li>
<hr>
@endforeach

</ul>

@else

No Items in Cart

@endif --}}

{{--
<form action="{{ route('orders.store') }}" method="POST">

@csrf

<input type="text" name="supplier_name" value="{{ $supplier->name }}" hidden>
<input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>
<input type="text" name="user_id" value="{{ Auth::user()->id ?? ''}}" hidden>

<input type="submit" class="btn-primary" value="Place Order">

</form> --}}



<div id="product-grid" class="flexCon">

  @forelse ($products as $product)

  <div class="col-25 mb">

    <div class="product bdr">

      <img src="{{ asset('storage/uploads/product_images/' . $product->image ) }}" alt="{{ $product->image }}">

      <div class="pxy">

        <a href="/products/{{ $product->id }}">{{ $product->name}}</a>

        <div class="price">{{ $product->price }}</div>

        <br>

        {{-- add item to order form --}}
        <form action="{{ route('products.addCart', $product->id ) }}" method="POST">

          @csrf

          <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>

          @component('components.input', [ 'field_for' => 'qty', 'title' => 'Qty', 'value' => 1])@endcomponent

          @component('components.submit', [ 'button_text' => 'Add Dish'])@endcomponent

        </form>

      </div>

    </div>

  </div>

  @empty

  <h5>There are no dishes available from this restaurant</h5>

  @endforelse

</div>

{{$products->links()}}

@endsection
