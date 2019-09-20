@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>

@if (session('status'))

<div class="bx dark">

  {{ session('status') }}

</div>

@endif

<h4>Order ID: ...</h4>
<div class="bx">
  <div class="bx-title mb">Delivery Address</div>
  {{ Auth::user()->address->street_num }}
  {{ Auth::user()->address->street }} <br>
  {{ Auth::user()->address->suburb }} <br>
  {{ Auth::user()->address->state }}
  {{ Auth::user()->address->postcode }}
</div>

@endsection
