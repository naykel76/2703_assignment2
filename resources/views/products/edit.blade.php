@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>

@include('products.product_create_edit')



@endsection
