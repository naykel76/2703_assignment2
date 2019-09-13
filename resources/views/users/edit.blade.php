@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="flexCon justify-ctr">

  <form class="bx light w400" method="POST" action="{{ route('profile.update', $user->id) }}">

    <h2 class="bx-title mb">{{ $title }}</h2>

    @csrf
    @method('PATCH')

    @component('components.input', [
    'field_for' => 'name', 'title' => 'Name', 'value' => $user->name
    ])@endcomponent

    @component('components.input', [
    'field_for' => 'email', 'title' => 'Email Address', 'value' => $user->email
    ])@endcomponent

    {{-- @component('components.input', [
    'field_for' => 'password', 'title' => 'Password', 'type' => 'password'
    ])@endcomponent

    @component('components.input', [
    'field_for' => 'password_confirmation', 'title' => 'Confirm Password', 'type' => 'password'
    ])@endcomponent --}}

    @component('components.submit', [ 'button_text' => 'Update Profile'])@endcomponent

  </form>

</div>

@endsection
