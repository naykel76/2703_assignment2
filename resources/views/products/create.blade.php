@extends('layouts.app')

@section('title', $title)

@section('top-a')
@include('navs.nav-supplier')
@endsection


@section('content')

<h1>{{ $title }}</h1>

<div class="bx">

  @include('products.create_edit_form')

</div>

@endsection
