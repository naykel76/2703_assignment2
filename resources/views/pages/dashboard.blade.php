@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $user->name }} {{ $title }}</h1>

@if(Auth::user()->hasRole('user'))

{{-- display user profile --}}
<p>Nothing to see here!</p>

@elseif (Auth::user()->hasRole('supplier'))

@if (!$supplier->is_approved)

<div class="bx-danger">

  You account has not been approved.

</div>

@else {{-- account is approved actions --}}

<div id="toolbar" class="flexCon mb">

  <a class="btn-primary mr" href="{{ route('supplier.orders') }}">Orders History</a>

  <a class="btn-primary mr" href="/suppliers/{{ $supplier->id }}/products" target="_blank">Display Menu</a>

  <a class="btn-primary mr" href="">** Best Sellers **</a>

  <a href="{{ route('products.create') }}" class="btn-success">Add New Dish</a>

</div>

@include('products.products_table')

@endif


@endif

@endsection
