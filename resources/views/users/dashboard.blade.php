@extends('layouts.app')

@section('title', $title)


@section('content')

<h1>{{ $title }}</h1>

<h4>Hello {{ $user->name }}</h4>

<a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>

@endsection
