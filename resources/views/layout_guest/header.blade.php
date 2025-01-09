<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('guest.home') }}">{{ __('layout_guest/header.home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('login') }}">{{ __('layout_guest/header.login') }}</a>
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
      </div>
    </div>
  </nav>