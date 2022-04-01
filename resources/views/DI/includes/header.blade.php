<nav class="navbar navbar-expand-lg navbar-light w-50 mx-auto">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ __('tasks') }}">{{ __('Tasks') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ __('notes') }}">{{ __('Notes') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ __('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ __('register') }}">{{ __('Register') }}</a>
        </li>
        <li>
          @include('DI.partials/language_switcher')
        </li>
      </ul>
    </div>
  </div>
</nav>