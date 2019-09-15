@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<h4>Hello {{ $user->name }}</h4>

<a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>

{{-- {{$this->role()->where('role_id', 1)->first()}} --}}

@if(Auth::user()->isAdmin())
enter code here
@endif

{{-- {{auth()->user()->roles()->get()}} --}}
{{-- {{dd(auth()->user()->roles()->isAdmin())}} --}}
{{-- <td>{{ implode(',', $user->roles()->get()->pluck('title')->toArray()) }}</td> --}}
{{-- <td>{{ implode(',', $user->roles()->get() }}</td> --}}
@endsection
