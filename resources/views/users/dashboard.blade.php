@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<h4>{{ $user->name }} Menu Items</h4>


@if(Auth::user()->hasRole('user'))

{{-- display user profile --}}

@elseif (Auth::user()->hasRole('supplier'))


{{-- display dishes --}}
@include('products.products_table')


@endif


@endsection
