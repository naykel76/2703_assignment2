@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>


{{-- 7. [ ] A restaurant (user) can see a list of orders customers have placed on his/her restaurant. An order should consist of the name of the consumer, that dish (name) that was ordered, and the date that the order was placed. --}}


{{-- each order is a single order collection --}}
@foreach ($orders as $order)

<div class="bx pxy-sm">

  <span><strong>Order Number: </strong>{{ $order->id }}</span>

  <span class="ml"><strong>Date Ordered: </strong>{{ $order->created_at }}</span>

  <span class="ml"><strong>Customer: </strong>{{ App\User::find($order->user_id)->name }}</span>

  <br>


  <ul>
    {{-- each orderDetails is single order line item --}}
    @foreach ($order->orderDetails as $lineitem)

    <li>{{ App\Product::find($lineitem->product_id)->name }}</li>

    @endforeach

  </ul>

</div>

@endforeach

@endsection
