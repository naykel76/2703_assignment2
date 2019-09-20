@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $supplier->name }} Menu</h1>

@if (Session::has('cart'))

Total items in cart: {{ Session('cart')->totalQty }}

<ul class="lst">

  @foreach (Session::get('cart')->items as $product)

  <li>

    <input type="text" value="{{$product['qty']}}" style="width: 50px;" disabled>
    {{$product['item']['name']}}

    {{-- <span>{{$item['name']}}</span> &nbsp;&nbsp;&nbsp; <span class="txt-red">{{$item['price']}}</span></li> --}}

  @endforeach

</ul>
{{--
<a href="/suppliers/{{session('supplier_id')}}/products">Back To Menu</a>

<form action="{{ route('orders.store') }}" method="POST">

  @csrf

  <input type="text" name="supplier_id" value="{{session('supplier_id')}}" hidden>
  <input type="text" name="user_id" value="{{ Auth::user()->id ?? ''}}" hidden>
  <input type="submit" class="btn-primary" value="Place Order">

</form> --}}

@else

No Items in Cart

@endif


<div id="product-grid" class="flexCon">

  @forelse ($products as $product)

  <div class="col-25 mb">

    <div class="product bdr">

      <img src="{{ asset('storage/uploads/product_images/' . $product->image ) }}" alt="{{ $product->image }}">

      <div class="pxy">

        <h4>{{ $product->name}}</h4>

        <div class="price">{{ $product->price }}</div>

        <br>

        {{-- must be authorized else error --}}
        @auth

        {{-- if the user authenticated user is a consumer display add to cart form --}}
        @if (Auth::user()->hasRole('user'))

        <form action="{{ route('products.addCart', $product->id ) }}" method="POST">

          @csrf

          <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>

          @component('components.input', [ 'field_for' => 'qty', 'title' => 'Qty', 'value' => 1])@endcomponent

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
