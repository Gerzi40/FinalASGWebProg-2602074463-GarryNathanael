<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <!-- Navbar Brand -->
      <a class="navbar-brand" href="#">Navbar</a>
      <!-- Navbar Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar Content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Menu -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('user.home') }}">{{ __('layout_user/header.home') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.showRequest') }}">{{ __('layout_user/header.req') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.friendList') }}">{{ __('layout_user/header.list') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.showShop') }}">{{ __('layout_user/header.shop') }}</a>
              </li>
              <li>
                <form action="{{ route('localization') }}" id="lang" method="POST">
                    @csrf
                    <li class="nav-item dropdown">
                        <select name="locale" class="form-select form-select-sm" id="language" onchange="document.getElementById('lang').submit()">
                            <option value="en" {{ App::currentLocale() == 'en' ? 'selected' : '' }}>EN</option>
                            <option value="id" {{ App::currentLocale() == 'id' ? 'selected' : '' }}>ID</option>
                        </select>
                    </li>
                </form>
              </li>
          </ul>
          <div class="d-flex align-items-center">
              <form class="d-flex me-3" role="search" action="{{ route('user.home') }}">
                  <input class="form-control " type="search" name="search" placeholder="Search by gender" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">{{ __('layout_user/header.search') }}</button>
              </form>
              <a href="{{ route('logout') }}" class="btn btn-danger">{{ __('layout_user/header.logout') }}</a>
          </div>
      </div>
  </div>
</nav>
