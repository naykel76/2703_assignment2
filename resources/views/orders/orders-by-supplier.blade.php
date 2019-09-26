@extends('layouts.app')

@section('title', $title)

@section('top-a')
@include('navs.nav-supplier')
@endsection


@section('content')

<h1>{{ $title }}</h1>

{{-- each order is a single order collection --}}
@forelse ($orders->sortByDesc('created_at') as $order)

<div class="bx pxy-sm">

  <span><strong>Order Number: </strong>{{ $order->id }}</span>

  <span class="ml"><strong>Date Ordered: </strong>{{ $order->created_at->format('d-m-y') }}</span>

  <span class="ml"><strong>Customer: </strong>{{ App\User::find($order->user_id)->name }}</span>

  <br>

  <ul class="lst">
    {{-- each orderDetails is single order line item --}}
    @foreach ($order->orderDetails as $lineitem)

    <li>
      {{ App\OrderDetail::find($lineitem->id)->qty }} x
      {{ App\Product::find($lineitem->product_id)['name'] }}
      ${{ App\OrderDetail::find($lineitem->id)->ext_price }}
    </li>

    @endforeach

  </ul>

</div>

@empty

<p>You do not have any orders</p>

@endforelse

{{$orders->links()}}

@endsection
