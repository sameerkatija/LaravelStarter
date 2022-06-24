<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('landing')}}">EasyCamp!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href=" {{ route('landing')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title == 'Campgrounds'? ' active' :  ' '  }}" href="{{ route('campground')}}">Campgrounds</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title == 'New Campground'? ' active' :  ' '  }}" href="{{ route('newCampground')}}">New Campground</a>
        </li>
        <div class='navbar-nav ms-auto mb-2 mb-lg-0'>
            @if (!(Session()->get('Login_id')))
            <li class="nav-item">
            <a class="nav-link {{ $title == 'Login'? ' active' :  ' '  }}" href="{{ route('login')}}">Log in</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ $title == 'Register'? ' active' :  ' '  }}" href="{{ route('register')}}">Register</a>
            </li>
            @else
            <li class="nav-item">
            <a class="nav-link" href="{{ route('signout')}}">Signout</a>
            </li>
            @endif
        </div>

      </ul>
    </div>
  </div>
</nav>