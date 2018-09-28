<nav class="col-sm-3 col-md-2 hidden-xs-down bg-secondary sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link  text-light {{ Request::routeIs('posts.index') ? 'active' : '' }}"
                href="{{ route('posts.index', ['course' => Request::route('course')]) }}">
              Obavijesti{!! Request::routeIs('posts.index') ? '<span class="sr-only">(current)</span>' : '' !!}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light {{ (Request::routeIs('opentext.show') && Request::route('type') == 1) ? 'active' : '' }}"
                href="{{ route('opentext.show', ['course' => Request::route('course'), 'type' => 1]) }}">
              O kolegiju{!! Request::routeIs('opentext.show') && Request::route('type') == 1 ? '<span class="sr-only">(current)</span>' : '' !!}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light {{ (Request::routeIs('opentext.show') && Request::route('type') == 2) ? 'active' : '' }}" 
                href="{{ route('opentext.show', ['course' => Request::route('course'), 'type' => 2]) }}">
              Materijali{!! (Request::routeIs('opentext.show') && Request::route('type') == 2) ? '<span class="sr-only">(current)</span>' : '' !!}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light {{ Request::routeIs('/') ? 'active' : '' }}"
                href="#">
              Zadaci{!! Request::routeIs('/') ? '<span class="sr-only">(current)</span>' : '' !!}
            </a>
          </li>
          @if ( Auth::check() )
          <li class="nav-item">
            <a class="nav-link text-light {{ Request::routeIs('/') ? 'active' : '' }}"
                href="#">
              Rezultati{!! Request::routeIs('/') ? '<span class="sr-only">(current)</span>' : '' !!}
            </a>
          </li>
          @if (Auth::user()->isAdmin( Request::route('course') ) )
          <li class="nav-item">
            <a class="nav-link text-light {{ Request::routeIs('/') ? 'active' : '' }}"
                href="#">
              Uređivanje{!! Request::routeIs('posts.index') ? '<span class="sr-only">(current)</span>' : '' !!}
            </a>
          </li>
          @endif
          @endif
        </ul>
</nav>