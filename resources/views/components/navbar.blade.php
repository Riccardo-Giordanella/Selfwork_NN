<nav class="navbar navbar-expand-md">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/media/logo.png" alt="Logo" class="logo">The Journal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('articles.index')}}">I nostri articoli</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('articles.create')}}">Crea articolo</a>
        </li>
        @endauth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto/a
          </a>
          <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
            @endguest
            @auth
            <li>
              <form class="dropdown-item btn logout" href="#" method="POST" action="{{route('logout')}}"> @csrf <button class="btn logout nav-link" type="submit">Esci</button></form>
            </li>
            @endauth
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>