@extends('layouts.app')

@section('content')


<div class="bx light w400 ">

  @if (session('status'))

  <div class="alert alert-success" role="alert">

    {{ session('status') }}

  </div>

  @endif

  <form method="POST" action="{{ route('password.email') }}">

    @csrf

    <div class="frm-row">

      <label for="email">{{ __('E-Mail Address') }}</label>

      <input id="email" type="email" class="@error('email') danger @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

      @error('email')

      <span class="txt-red" role="alert"> {{ $message }} </span>

      @enderror

    </div>


    <div class="frm-row">

      <button type="submit" class="btn-primary"> {{ __('Send Password Reset Link') }} </button>

    </div>

  </form>

</div>

@endsection
