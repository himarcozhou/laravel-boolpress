<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Laravel Blog</a>
    <ul class="navbar-nav px-3 ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('index') }}">
          Visita il sito
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>