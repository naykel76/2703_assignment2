@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<h4>{{ $user->name }} Menu Items</h4>

{{-- <a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a> --}}


@if(Auth::user()->hasRole('user'))

{{-- display user profile --}}

@elseif (Auth::user()->hasRole('supplier'))


{{-- display dishes --}}
@include('products.products_table')


@endif


@endsection
