@extends('layouts.app')

@section('title', $title)

@section('top-a')
@include('navs.nav-supplier')
@endsection

@section('content')

<h1>{{ $title }}</h1>

@include('products.create_edit_form')

@endsection
