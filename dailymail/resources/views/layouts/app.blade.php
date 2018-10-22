
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>@yield('title','NIPOOK')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">

          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="{{ url('/') }}">@yield('title','NIPOOK')</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">

            @guest
                <a class="text-muted" href="{{ route('login') }}">{{ __('Login') }}</a>　
                @if (Route::has('register'))
                    <a class="text-muted" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
              <ul style="list-style: none;">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
              </ul>
            @endguest

          </div>
        </div>
      </header>

      <div class="content">
        @yield('content')
      </div>

      <main role="main" class="container">
        @yield('main')
      </main><!-- /.container -->

    <footer class="blog-footer">

    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    @yield('js')
  </body>
</html>
