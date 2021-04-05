<!-- Header -->
<header id="header" class="header">

  <!-- Logo - Image Based -->
  <div class="header__logo header__logo--img">
    <a href="<?= base_url('/') ?>"><img src="<?= base_url('images/logo.png') ?>" alt="Escapium"></a>
  </div>
  <!-- Logo - Image Based / End -->

  <div class="header__spacer"></div>
  <!-- Main Navigation -->
  <nav class="main-nav">
    <ul class="main-nav__list">
      <li class="active"><a href="<?= base_url('Home') ?>">Inicio</a></li>
      <li class=""><a href="<?= base_url('Home/nosotros') ?>">¿Quienes somos?</a></li>
      <li class=""><a href="<?= base_url('Home/planes') ?>">Planes</a> </li>
      <li class=""><a href="<?= base_url('Home/eventos') ?>">Eventos</a></li>
      <li class=""><a href="<?= base_url('Home/equipos') ?>">Equipo</a></li>
      <li class=""><a href="<?= base_url('Home/tabposicion') ?>">Tabla Posiciones</a></li>
    </ul>
  </nav>
  <!-- Main Navigation / End -->

  <!-- Secondary Navigation -->
  <nav class="header__nav header__nav--secondary">

    <!-- Secondary Nav -->
    <ul class="nav-secondary">

      <!-- Search Form Toggler -->
      <li class="nav-secondary__search">
        <div class="search-form-control js-search-form-control">
          <div class="search-form-toggler"></div>
          <i class="icon-magnifier search-form-toggler__icon"></i>
        </div>
      </li>
      <!-- Search Form Toggler / End -->

      <!-- Account -->
      <?php if(! session()->get('user_id')) : ?>
      <li class="nav-secondary__login">
        <a href="<?= base_url('login') ?>">
          <i class="icon-key"></i>
          <span class="link-label">Iniciar sesión</span>
        </a>
      </li>
      <li class="nav-secondary__login">
        <a href="<?= base_url('signup') ?>">
          <i class="icon-user"></i>
          <span class="link-label">Registrate</span>
        </a>
      </li>
      <?php else : ?>
      <li class="nav-secondary__login">
          <?= session()->get('username') ?>
      </li>
      <li class="nav-secondary__login">
          <form action="<?= base_url('logout') ?>" method="post">
              <div class="ml-2">
                  <input type="submit" class="btn btn-primary btn-sm" value="Logout">
              </div>
          </form>
      </li>
      <?php endif ?>
      <!-- Account / End -->
    </ul>
    <!-- Secondary Nav / End -->
  </nav>
  <!-- Secondary Navigation / End -->

  <!-- Mobile Burger Menu Icon -->
  <a id="header-mobile__toggle" class="burger-menu-icon">
    <span class="burger-menu-icon__line"></span>
    <span class="burger-menu-icon__line"></span>
    <span class="burger-menu-icon__line"></span>
  </a>
  <!-- Mobile Burger Menu Icon / End -->

</header>
<!-- Header / End -->