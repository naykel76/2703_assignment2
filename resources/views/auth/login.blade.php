@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="flexCon justify-ctr">

  <form class="bx light w400" method="POST" action="{{ route('login') }}">

    <h2 class="bx-title mb">Login</h2>

    @csrf

    @component('components.input', [ 'field_for' => 'email', 'title' => 'E-Mail Address', 'type' => 'email'])@endcomponent

    <div class="frm-row">

      <div class="flexCon">
        <label class="grow" for="password">{{ __('Password') }}</label>

        @if (Route::has('password.request'))

        <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>

        @endif
      </div>

      <input id="password" type="password" class="@error('password') danger @enderror" name="password" autocomplete="current-password">

      @error('password')
      <span class="txt-red" role="alert"> {{ $message }} </span>
      @enderror
    </div>

    <div class="frm-row">

      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label for="remember"> {{ __('Remember Me') }} </label>

    </div>

    <div class="frm-row">

      <button type="submit" class="btn-primary"> {{ __('Login') }} </button>

    </div>

  </form>

</div>

@endsection
