<div class="flexCon align-m">

  {{-- {{ dd(Session::all()) }} --}}

  <nav class="nav bdr">`
    <a href="/suppliers">Restaurants</a>
    <a href="/markdown/?filename=docs/assignment_2.md">Docs</a>
  </nav>


  {{-- supplier nav --}}
  @auth

  @if (Auth::user()->hasRole('supplier'))

  <nav class="nav bdr danger">

    <a href="{{ route('supplier.orders') }}">Orders History</a>

    <a href="/telescope" target="_blank">Telescope</a>

  </nav>

  @endif
  {{-- end supplier nav --}}

  @endauth

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

<div class="dd">

  <div class="btn-secondary">
    <svg class="icon-cart">
      <use xlink:href="/svg/icons.svg#icon-cart"></use>
    </svg>
  </div>


  <div class="dd-content">

    {{-- @if (Session::has('cart'))


    <ul>

      @foreach (Session::get('cart') as $item)

      <li><span>{{$item['name']}}</span> &nbsp;&nbsp;&nbsp; <span class="txt-red">{{$item['price']}}</span></li>

    @endforeach

    </ul>

    <a href="/suppliers/{{session('supplier_id')}}/products">Back To Menu</a>

    <form action="{{ route('orders.store') }}" method="POST">

      @csrf

      <input type="text" name="supplier_id" value="{{session('supplier_id')}}" hidden>
      <input type="text" name="user_id" value="{{ Auth::user()->id ?? ''}}" hidden>
      <input type="submit" class="btn-primary" value="Place Order">

    </form>

    @else

    No Items in Cart

    @endif --}}

  </div>
</div>
