<nav class="navbar navbar-expand-lg navbar-light bg-light">
@auth
  <a class="navbar-brand" href="/">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @endauth
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    @if (!auth()->check())
      <li class="nav-item active">
        <a class="nav-link" href="/signup">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/signin">Sign in</a>
      </li>
      @endif
      @auth
      <li class="nav-item">
        <a class="nav-link" href="/signout">Sign Out</a>
      </li>
      @endauth
    </ul>
  </div>
</nav>