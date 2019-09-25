{{-- supplier nav --}}
@auth

@if (Auth::user()->hasRole('supplier'))

<nav class="nav bdr danger">

  <a href="{{ route('supplier.orders') }}">Orders History</a>

  <a href="{{ route('dashboard') }}">Dashboard</a>

</nav>

@endif
{{-- end supplier nav --}}

@endauth
