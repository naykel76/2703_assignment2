{{-- the list template is used for administraion functions --}}
@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>list of items????</h1>
{{--
<div class="container">

  <h1>{{$title}}</h1>

@forelse ($products as $product)
<div class="bx pxy-sm">
  <a href="/products/{{ $product->id }}">{{ $product->name}}</a>
</div>
@empty
<h5>There are no dishes available from this restaurant</h5>
@endforelse


</div> --}}

@endsection
