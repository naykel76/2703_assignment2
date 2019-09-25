@extends('layouts.app')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>

@include('products.create_edit_form')

@endsection
