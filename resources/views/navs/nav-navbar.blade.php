<div class="flexCon align-m">

  <nav class="nav bdr">
    <a href="/suppliers">Restaurants</a>
    <a href="/markdown/?filename=docs/assignment_2.md">Docs</a>
    <a href="/dashboard">Dashboard</a>
  </nav>
  <nav class="nav bdr success">
    <a href="{{ route('products.create') }}">Create Product</a>
  </nav>
  <nav class="nav bdr danger">
    <a href="/admin/dashboard">Admin</a>
    <a href="/telescope" target="_blank">Telescope</a>
  </nav>

  @guest

  <a class="mx" href="{{ route('login') }}">{{ __('Login') }}</a>

  @if (Route::has('register'))

  <a href="{{ route('register') }}">{{ __('Register') }}</a>

  @endif

  @else
  <div class="dd">

    <div class="btn-secondary">
      <svg class="icon-user">
        <use xlink:href="/svg/icons.svg#icon-user"></use>
      </svg>
    </div>

    <div class="dd-content">

      <h5> Hello, {{ Auth::user()->name }} </h5>
      <hr>
      <ul class="lst">
        <li>
          {{-- {{ Auth::user()->id }} --}}
          <a href="{{ route('profile.edit', Auth::user()->id) }}">
            <svg class="icon-user-o">
              <use xlink:href="/svg/icons.svg#icon-user-o"></use>
            </svg>
            Edit Profile
          </a>
        </li>
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

</div>
