<?php helper('users'); ?>
<?php include('paypal/config.php'); ?>

<body data-spy="scroll" data-target="#navbar-example">
  <main id="main">
    <!-- ======= Sección Nosotros ======= -->
    <div id="about" class="site-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 100px;">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="main-title">
              <h3>PRECIO ENTRADA BÁSICA, COLABORADORES Y EQUIPOS PATROCINADOS</h3>
            </div>

            <!--End ROW 1 -->
            <center class="main">
              <div class="columin-1">
                <h2 class="first-title">ENTRADA BÁSICA</h2>
                <h1 class="currency"><span class="dollar-sign">&#x24;</span>15 USD</h1>
                <p class="month">INCLUYE</p>
                <ul class="items">
                  <li>1 cupo en el torneo</li>
                  <li>Publicación de presentación de equipo confirmado del evento.</li>
                </ul>
                <p class="month">DESCRIPCIÓN</p>
                <ul class="description">
                  <li>Es el pase más básico al torneo.</li>
                  <li>Sólo asegura su lugar dentro de la competencia.</li>
                  <li>No puede elegir en qué grupo o que fecha jugar (está a dispocisión de la organicación).</li>
                  <li>No puede jugar con miembros sin tag (sólo en las fases que la organización determine).</li>
                  <li>No puede cambiar roster durante fases, solo uando se le indique en el reglamento y debe respetar todo el reglamento completo.</li>
                </ul>
                <?php if (is_user()) : ?>
                  <?php $productId = 1; ?>
                  <?php $productPrice = 15; ?>
                  <?php $currency = "USD"; ?>
                  <div id="paypal-buttonP1"></div>
                  <?php include('paypal/paypalCheckoutP1.php'); ?>
                <?php else : ?>
                  <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                <?php endif ?>
              </div>
              <!--End columin-1-->

              <div class="columin-2">
                <center>
                  <h2 class="first-title">PASE COLABORADOR</h2>
                  <h1 class="currency"><span class="dollar-sign">&#x24;</span>45 USD</h1>
                  <p class="month">INCLUYE</p>
                  <ul class="items">
                    <li>1 cupo en el torneo</li>
                    <li>Publicación de presentación de equipo confirmado del evento.</li>
                    <li>Menciones en las fases del torneo en directo.</li>
                    <li>Posibilidad de jugar con un miembro sin tag.</li>
                    <li>Check-In automático.</li>
                    <li>10% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                    <li>Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                    <li>Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                      cuentas de jugadores en reglamento).</li>
                  </ul>
                  <p class="month">DESCRIPCIÓN</p>
                  <ul class="description">
                    <li>Pase con más beneficios para el equipo que lo adquiera.</li>
                    <li>No entra como equipo patrocinador del torneo.</li>
                    <li>Podrá escoger en qué grupo jugar cada fase siempre y cuando no se hayan hecho los grupos, para esto se le pregunta
                      al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también en caso de pasar
                      de ronda tiene derecho a elegir qué día jugar.</li>
                  </ul>
                  <?php if (is_user()) : ?>
                    <?php $productId = 2; ?>
                    <?php $productPrice = 45; ?>
                    <?php $currency = "USD"; ?>
                    <div id="paypal-buttonP2"></div>
                    <?php include('paypal/paypalCheckoutP2.php'); ?>
                  <?php else : ?>
                    <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                  <?php endif ?>
                </center>
              </div>
              <!--End columin-2-->

              <div class="columin-3">
                <center>
                  <h2 class="first-title">PASE COLABORADOR PLUS</h2>
                  <h1 class="currency"><span class="dollar-sign">&#x24;</span>80 USD</h1>
                  <p class="month">INCLUYE</p>
                  <ul class="items">
                    <li>2 cupos en el torneo(promoción para 2 equipos).</li>
                    <li>Publicación de presentación de equipos confirmados del evento.</li>
                    <li>Menciones en las fases del torneo en directo.</li>
                    <li>Posibilidad de jugar con un miembro sin tag.</li>
                    <li>Check-In automático.</li>
                    <li>10% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                    <li>Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                    <li>Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                      cuentas de jugadores en reglamento).</li>
                  </ul>
                  <p class="month">DESCRIPCIÓN</p>
                  <ul class="description">
                    <li>Pase con más beneficios para el equipo que lo adquiera.</li>
                    <li>No entra como equipo patrocinador del torneo.</li>
                    <li>Podrá escoger en qué grupo jugar cada fase siempre y cuando no se hayan hecho los grupos, para esto se le pregunta
                      al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también en caso de pasar
                      de ronda tiene derecho a elegir qué día jugar.</li>
                  </ul>
                  <?php if (is_user()) : ?>
                    <?php $productId = 3; ?>
                    <?php $productPrice = 80; ?>
                    <?php $currency = "USD"; ?>
                    <div id="paypal-buttonP3"></div>
                    <?php include('paypal/paypalCheckoutP3.php'); ?>
                  <?php else : ?>
                    <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                  <?php endif ?>
                </center>
              </div>
              <!--End columin-3-->
            </center>
            <!--End Main-->

            <!--End ROW 2 -->
            <center class="main">
              <div class="columin-1">
                <h2 class="first-title">SPONSOR TEAM GOLD</h2>
                <h1 class="currency"><span class="dollar-sign">&#x24;</span>99 USD</h1>
                <p class="month">INCLUYE</p>
                <ul class="items">
                  <li>1 cupo en el torneo</li>
                  <li>Publicación de presentación de equipo confirmado del evento.</li>
                  <li>Publicación de presentación e historia de equipo patrocinador.</li>
                  <li>Logo de equipo patrocinador dentro de publicaciones del torneo y también en el diseño de la transmisión.</li>
                  <li>Entrevista especial para equipo patrocinador para social media y livestreaming.</li>
                  <li>Menciones en las fases del torneo en directo.</li>
                  <li>Posibilidad de jugar con un miembro sin tag(hasta fase de Knockout).</li>
                  <li>Check-In automático.</li>
                  <li>15% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                  <li>Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                  <li>Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                    cuentas de jugadores en reglamento).</li>
                </ul>
                <p class="month">DESCRIPCIÓN</p>
                <ul class="description">
                  <li>Pase de patrocinador con más beneficios para los equipos que lo adquieran.</li>
                  <li>Ya entra como equipos patrocinadores del torneo.</li>
                  <li>Podrá escoger en qué grupo jugar la fase de clasificación siempre y cuando no se hayan hecho los grupos, para esto
                    se le pregunta al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también
                    en caso de pasar de ronda tiene derecho a elegir qué día jugar.</li>
                </ul>
                <?php if (is_user()) : ?>                  
                  <?php $productId = 4; ?>
                  <?php $productPrice = 99; ?>
                  <?php $currency = "USD"; ?>
                  <div id="paypal-buttonP4"></div>
                  <?php include('paypal/paypalCheckoutP4.php'); ?>
                <?php else : ?>
                  <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                <?php endif ?>
              </div>
              <!--End columin-1-->

              <div class="columin-2">
                <center>
                  <h2 class="first-title">DOUBLE SPONSOR TEAMS GOLD</h2>
                  <h1 class="currency"><span class="dollar-sign">&#x24;</span>170 USD</h1>
                  <p class="month">INCLUYE</p>
                  <ul class="items">
                    <li>2 cupos en el torneo</li>
                    <li>Publicación de presentación de equipo confirmado del evento.</li>
                    <li>Publicación de presentación e historia de equipo patrocinador.</li>
                    <li>Logo de equipo patrocinador dentro de publicaciones del torneo y también en el diseño de la transmisión.</li>
                    <li>Entrevista especial para equipo patrocinador para social media y livestreaming.</li>
                    <li>Menciones en las fases del torneo en directo.</li>
                    <li>Posibilidad de jugar con un miembro sin tag(hasta fase de Knockout).</li>
                    <li>Check-In automático.</li>
                    <li>15% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                    <li>Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                    <li>Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                      cuentas de jugadores en reglamento).</li>
                  </ul>
                  <p class="month">DESCRIPCIÓN</p>
                  <ul class="description">
                    <li>Pase de patrocinador con más beneficios para los equipos que lo adquieran.</li>
                    <li>Ya entra como equipos patrocinadores del torneo.</li>
                    <li>Podrá escoger en qué grupo jugar la fase de clasificación siempre y cuando no se hayan hecho los grupos, para esto
                      se le pregunta al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también
                      en caso de pasar de ronda tiene derecho a elegir qué día jugar.</li>
                  </ul>
                  <?php if (is_user()) : ?>                    
                    <?php $productId = 5; ?>
                    <?php $productPrice = 170; ?>
                    <?php $currency = "USD"; ?>
                    <div id="paypal-buttonP5"></div>
                    <?php include('paypal/paypalCheckoutP5.php'); ?>
                  <?php else : ?>
                    <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                  <?php endif ?>
                </center>
              </div>
              <!--End columin-2-->
            </center>
            <!--End Main-->

          </div>
        </div>

      </div>
    </div><!-- End Sección Nosotros -->
  </main><!-- End #main -->
</body>