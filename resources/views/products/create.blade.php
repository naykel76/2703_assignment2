@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>
<div class="bx">
  @include('products.create_edit_form')



</div>


@endsection
