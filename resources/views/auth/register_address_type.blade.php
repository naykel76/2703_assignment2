@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="flexCon justify-ctr">

  <form class="bx light" method="POST" action="{{ route('register') }}">

    <h1 class="bx-title mb">{{ $title }}</h1>

    @csrf

    <hr>

    <div class="frm-row">
      <h4>Account Type</h4>
      <label>
        <input type="radio" name="role_id" value="2">
        Consumer
      </label>
      <span class="mr"></span>
      <label>
        <input type="radio" name="role_id" value="3">
        Resturant
      </label>
      @error('role_id')
      <div class="txt-red" role="alert"> {{ 'Account type is required.' }} </div>
      @enderror
    </div>

    <hr>

    <h4>Login Details</h4>

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


    <hr>

    <h4>Address</h4>

    <div class="row row-nma">
      <div class="col-20">
        @component('components.input', [ 'field_for' => 'street_num', 'title' => 'Number'])@endcomponent
      </div>
      <div class="col">
        @component('components.input', [ 'field_for' => 'street', 'title' => 'Street'])@endcomponent
      </div>
    </div>



    {{-- address fields --}}
    <div class="row row-nma">

      <div class="col">
        @component('components.input', [ 'field_for' => 'suburb', 'title' => 'Suburb', 'type' => ''])@endcomponent
      </div>

      <div class="col">
        @component('components.input', [ 'field_for' => 'state', 'title' => 'State', 'type' => ''])@endcomponent
      </div>

      <div class="col-20">
        @component('components.input', [ 'field_for' => 'postcode', 'title' => 'PostCode', 'type' => ''])@endcomponent
      </div>

    </div>

    <hr>

    {{-- @component('components.select', [ 'field_for' => 'for', 'title' => 'title/label', 'collection' => 'what goes here??',])@endcomponent --}}



    @component('components.submit', [ 'button_text' => 'Register'])@endcomponent

  </form>

</div>

@endsection
