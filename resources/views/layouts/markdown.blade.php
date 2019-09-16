<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" ?lang=css></script>
  @include('layouts.partials.head')
</head>

<body>

  {{-- style overides for markdown only --}}
  <style>
    ul,
    ol {
      margin: 0;
    }

    ul li,
    ol li {
      margin: .5rem;
    }

    p+ul {
      margin-top: 0 !important;
    }
  </style>

  @include('layouts.partials.navbar')

  @yield('top-a')

  @yield('top-b')

  <main id="nk-middle">

    <div class="container">

      <div class="container">
        <?php  $text = file_get_contents($filename); ?> @parsedown($text)
      </div>

    </div>

  </main>

  @yield('bottom-a')

  @yield('bottom-b')

  @include('layouts.partials.footer')

</body>

</html>
