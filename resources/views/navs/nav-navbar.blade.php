<nav class="nav bdr">

  <a href="/suppliers">Restaurants</a>

  <a href="/">ER Diagram **</a>

  <a href="/products/most-popular">Popular Items</a>

  <a href="/markdown/?filename=docs/assignment_2.md">Docs</a>

</nav>

{{-- supplier nav --}}
@auth

@if (Auth::user()->hasRole('supplier'))

@include('navs.nav-navbar-supplier')

@endif

@endauth
{{-- end supplier nav --}}
