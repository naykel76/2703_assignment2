@extends('layouts.app')

@section('title', $title)

@if(Auth::user()->hasRole('supplier'))
@section('top-a')
@include('navs.nav-supplier')
@endsection
@endif


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

@include('products.products_table')

@endif

@endif

@endsection
