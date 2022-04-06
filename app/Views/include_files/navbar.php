<!-- Header -->
<div style="background: black; width: 100%; height: auto; text-align: right; padding: 2px 15px 5px 0; z-index: 103;">
    <div id="cvelanguage" class="dropdown">
    <a class="dropbtn"><img src="<?= base_url('images/es.png') ?>" style="width: 20px; height: 15px;"> es </a>
        <div class="dropdown-content">
          <a onclick="Initialize('es');"><img src="<?= base_url('images/es.png') ?>" style="width: 20px; height: 15px;"> es </a>
          <a onclick="Initialize('en');"><img src="<?= base_url('images/en.png') ?>" style="width: 20px; height: 15px;"> en </a>
        </div>
    </div>    
</div>
<header id="header" class="header" style="position: inherit;">

  <!-- Logo - Image Based -->
  <div class="header__logo header__logo--img">
    <a href="<?= base_url('/') ?>"><img src="<?= base_url('images/logo.png') ?>" alt="Escapium"></a>
  </div>
  <!-- Logo - Image Based / End -->

  <div class="header__spacer"></div>
  <!-- Main Navigation -->
  <nav class="main-nav">
    <ul class="main-nav__list">
      <li><a id="lminicio" href="<?= base_url('Home') ?>">Inicio</a></li>
      <li><a id="lmsomos" href="<?= base_url('Home/nosotros') ?>">¿Quienes somos?</a></li>
      <li><a id="lmplan" href="<?= base_url('Home/planes') ?>">Planes</a> </li>
      <li><a id="lmevento" href="<?= base_url('Home/eventos') ?>">Eventos</a></li>
      <?php if(session()->get('user_id')): ?>
        <li><a id="lmequipo" href="<?= base_url('teams') ?>">Equipo</a></li>
      <?php else: ?>
        <li><a id="lmequipo" href="<?= base_url('Home/equipos') ?>">Equipo</a></li>
      <?php endif?>
      <li><a id="lmposicion" href="<?= base_url('Home/tabposicion') ?>">Tabla Posiciones</a></li>
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
        <a id="lmsesion" href="<?= base_url('login') ?>">
          <i class="icon-key"></i>
          <span class="link-label">Iniciar sesión</span>
        </a>
      </li>
      <li class="nav-secondary__login">
        <a id="lmregistro" href="<?= base_url('signup') ?>">
          <i class="icon-user"></i>
          <span class="link-label">Registrate</span>
        </a>
      </li>
      <?php else : ?>
      <li class="nav-secondary__login">
          <!-- <?= session()->get('username') ?> -->
      </li>
      <li class="nav-secondary__login">
          <form action="<?= base_url('logout') ?>" method="post">
              <?= csrf_field() ?>
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