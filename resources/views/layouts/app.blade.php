<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('layouts.partials.head')
</head>

<body>

  @include('layouts.partials.navbar')

  @yield('top-a')

  @yield('top-b')

  <main id="nk-middle">

    <div class="container px-xl">

      @yield('content')

    </div>

  </main>

  @yield('bottom-a')

  @yield('bottom-b')

  @include('layouts.partials.footer')

</body>

</html>
