@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="flexCon justify-ctr">

  <form class="bx light w400" method="POST" action="{{ route('register') }}">

    <h2 class="bx-title mb">Register</h2>

    @csrf

    @component('components.input', [
    'field_for' => 'name', 'title' => 'Name'
    ])@endcomponent

    @component('components.input', [
    'field_for' => 'email', 'title' => 'Email Address'
    ])@endcomponent

    @component('components.input', [
    'field_for' => 'password', 'title' => 'Password', 'type' => 'password'
    ])@endcomponent

    @component('components.input', [
    'field_for' => 'password_confirmation', 'title' => 'Confirm Password', 'type' => 'password'
    ])@endcomponent

    @component('components.submit', [ 'button_text' => 'Register'])@endcomponent

  </form>

</div>

@endsection
