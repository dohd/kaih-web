<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="/" class="logo d-flex align-items-center">
      <!-- image logo -->
      @if (@$headerFooter['logo'])
        <img src="{{ $headerFooter['logo']['url'] }}" alt="{{ explode('.', $headerFooter['logo']['fileName'])[0] }}"> 
      @endif
      <h1 class="sitename">{{ @$headerFooter['shortName'] ?: config('app.name') }}</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="/#about"><b>About Us</b></a></li>
        <li><a href="/#services"><b>Our Programs</b></a></li>
        <li><a href="/#pricing"><b>Our Partners</b></a></li>
        <li><a href="{{ route('news') }}" data-link="news"><b>News & Blog</b></a></li>
        <!-- 
        <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li>
        -->
        <li><a href="/#contact"><b>Contact</b></a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>
