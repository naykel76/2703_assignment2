<div class="navbar">

  <div class="container">

    <div class="logo">

      <a href="/" class="logo"><img src="{{ url('logo.svg') }}" height="80" alt="Food4U"></a>

    </div>

    <div class="right">

      <div class="login txt-r mb">

        @component('components.login_register')@endcomponent

        @if (!Auth::User() || Auth::user()->hasRole('user'))
        {{--  --}} @component('components.cart')@endcomponent
        @endif

      </div>

      <div class="flexCon align-m">

        @include('navs.nav-navbar')

      </div>

    </div>

  </div>

</div>
