@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<div class="bx">

  @include('products.product_create_edit')

</div>


@endsection
