@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<div class="bx-danger">

  <div class="txt-lg">need to pass over user id</div>

</div>

{{-- @include('layouts.partials.error') --}}

@include('products.product_create_edit')

@endsection
