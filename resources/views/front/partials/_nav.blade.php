<nav class="nav-menu d-none d-lg-block">
    <ul>
      <li class="active"><a href="{{ route('home') }}">Accueil</a></li>
      <li><a href="#about">Qui sommes-nous ?</a></li>
      <li><a href="#services">Services</a></li>
      {{-- <li><a href="#portfolio">Portfolio</a></li> --}}
    @guest
        {{-- @if (Route::has('login'))
        <li><a href="{{ route('login') }}">Connexion</a></li>
        @endif --}}



    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
            </a>
            @if (Route::has('logout'))
            <li class="drop-down"><a href="">{{ Auth::user()->name }}</a>
                <ul>
                  <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                  {{-- <li><a href="#">Drop Down 2</a></li> --}}
                  {{-- <li><a href="#">Drop Down 3</a></li> --}}
                  @if (Route::has('logout'))
                  <li>
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        >
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        @honeypot
                    </form>
                    </li>

                    @endif
                </ul>
              </li>
            @endif
        </li>
    @endguest

      <li><a href="#contact">Contact</a></li>

    </ul>
  </nav><!-- .nav-menu -->



  @if (Route::has('login') && !get_user())
  <a href="{{ route('login') }}" class="get-started-btn scrollto">Se connecter</a>
@endif
