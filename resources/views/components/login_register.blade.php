{{---------------------------------------------------------------------------
  Login/Register component

  Display the login or register button for 'guest' or the account icon for
  authorised users

  @component('components.login_register'])@endcomponent
---------------------------------------------------------------------------}}

@guest

<a class="btn" href="{{ route('login') }}">{{ __('Login') }}</a>

@if (Route::has('register'))

<a class="btn mr" href="{{ route('register') }}">{{ __('Register') }}</a>

@endif

@else

<div class="dd txt-l">

  <div class="btn-secondary">

    <svg class="icon-user">
      <use xlink:href="/svg/icons.svg#icon-user"></use>
    </svg>

  </div>

  <div class="dd-content" style="right: 0;">

    <h5> Hello, {{ Auth::user()->name }} </h5>

    <hr>

    <ul class="lst">

      <li>

        <a href="{{ route('dashboard') }}">
          <svg class="icon-stack">
            <use xlink:href="/svg/icons.svg#icon-stack"></use>
          </svg>
          Dashboard
        </a>

      </li>

    </ul>

    <div class="txt-r">

      <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

    </div>

  </div>

</div>

@endguest
