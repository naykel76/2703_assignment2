@extends('layouts.app')

@section('content')

<form class="bx light w400" method="POST" action="{{ route('password.update') }}">

  @csrf

  <input type="hidden" name="token" value="{{ $token }}">

  <div class="frm-row">

    <label for="email">{{ __('E-Mail Address') }}</label>


    <input id="email" type="email" class="@error('email') danger @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

    @error('email')

    <span class="txt-red" role="alert"> {{ $message }} </span>

    @enderror

  </div>

  <div class="frm-row">

    <label for="password">{{ __('Password') }}</label>

    <input id="password" type="password" class="@error('password') danger @enderror" name="password" required autocomplete="new-password">

    @error('password')

    <span class="txt-red" role="alert"> {{ $message }} </span>

    @enderror

  </div>

  <div class="frm-row">

    <label for="password-confirm">{{ __('Confirm Password') }}</label>

    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

  </div>

  <div class="frm-row">

    <button type="submit" class="btn btn-primary"> {{ __('Reset Password') }} </button>

  </div>

</form>

@endsection
