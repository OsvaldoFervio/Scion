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
              <h3 id="lbtitle">PRECIO ENTRADA BÁSICA, COLABORADORES Y EQUIPOS PATROCINADOS</h3>
            </div>

            <!--End ROW 1 -->
            <center class="main">
              <div class="columin-1">
                <h2 id="lbasica" class="first-title">ENTRADA BÁSICA</h2>
                <h1 class="currency"><span class="dollar-sign">&#x24;</span>15 USD</h1>
                <p id="lbincluye" class="month">INCLUYE</p>
                <ul class="items">
                  <li id="lbi1">1 cupo en el torneo</li>
                  <li id="lbi2">Publicación de presentación de equipo confirmado del evento.</li>
                </ul>
                <p id="lbdescribe" class="month">DESCRIPCIÓN</p>
                <ul class="description">
                  <li id="lbd1">Es el pase más básico al torneo.</li>
                  <li id="lbd2">Sólo asegura su lugar dentro de la competencia.</li>
                  <li id="lbd3">No puede elegir en qué grupo o que fecha jugar (está a dispocisión de la organicación).</li>
                  <li id="lbd4">No puede jugar con miembros sin tag (sólo en las fases que la organización determine).</li>
                  <li id="lbd5">No puede cambiar roster durante fases, solo uando se le indique en el reglamento y debe respetar todo el reglamento completo.</li>
                </ul>
                <?php if (is_user()) : ?>                 
                  <?php $productPrice = 15; ?>
                  <?php $currency = "USD"; ?>                  
                  <?php $description = "ENTRADA BÁSICA"; ?>
                  <?php $primaryKey = session()->get('user_id'); ?> 
                  <div id="paypal-buttonP1"></div>
                  <?php include('paypal/paypalCheckoutP1.php'); ?>
                <?php else : ?>
                  <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                <?php endif ?>
              </div>
              <!--End columin-1-->

              <div class="columin-2">
                <center>
                  <h2 id="lcolaborador" class="first-title">PASE COLABORADOR</h2>
                  <h1 class="currency"><span class="dollar-sign">&#x24;</span>45 USD</h1>
                  <p id="lcincluye" class="month">INCLUYE</p>
                  <ul class="items">
                    <li id="lci1">1 cupo en el torneo</li>
                    <li id="lci2">Publicación de presentación de equipo confirmado del evento.</li>
                    <li id="lci3">Menciones en las fases del torneo en directo.</li>
                    <li id="lci4">Posibilidad de jugar con un miembro sin tag.</li>
                    <li id="lci5">Check-In automático.</li>
                    <li id="lci6">10% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                    <li id="lci7">Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                    <li id="lci8">Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                      cuentas de jugadores en reglamento).</li>
                  </ul>
                  <p id="lcdescribe" class="month">DESCRIPCIÓN</p>
                  <ul class="description">
                    <li id="lcd1">Pase con más beneficios para el equipo que lo adquiera.</li>
                    <li id="lcd2">No entra como equipo patrocinador del torneo.</li>
                    <li id="lcd3">Podrá escoger en qué grupo jugar cada fase siempre y cuando no se hayan hecho los grupos, para esto se le pregunta
                      al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también en caso de pasar
                      de ronda tiene derecho a elegir qué día jugar.</li>
                  </ul>
                  <?php if (is_user()) : ?>
                    <?php $productPrice = 45; ?>
                    <?php $currency = "USD"; ?>                    
                    <?php $description = "PASE COLABORADOR"; ?>
                    <?php $primaryKey = session()->get('user_id'); ?> 
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
                  <h2 id="lplus" class="first-title">PASE COLABORADOR PLUS</h2>
                  <h1 class="currency"><span class="dollar-sign">&#x24;</span>80 USD</h1>
                  <p id="lpincluye" class="month">INCLUYE</p>
                  <ul class="items">
                    <li id="lpi1">2 cupos en el torneo(promoción para 2 equipos).</li>
                    <li id="lpi2">Publicación de presentación de equipos confirmados del evento.</li>
                    <li id="lpi3">Menciones en las fases del torneo en directo.</li>
                    <li id="lpi4">Posibilidad de jugar con un miembro sin tag.</li>
                    <li id="lpi5">Check-In automático.</li>
                    <li id="lpi6">10% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                    <li id="lpi7">Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                    <li id="lpi8">Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                      cuentas de jugadores en reglamento).</li>
                  </ul>
                  <p id="lpdescribe" class="month">DESCRIPCIÓN</p>
                  <ul class="description">
                    <li id="lpd1">Pase con más beneficios para el equipo que lo adquiera.</li>
                    <li id="lpd2">No entra como equipo patrocinador del torneo.</li>
                    <li id="lpd3">Podrá escoger en qué grupo jugar cada fase siempre y cuando no se hayan hecho los grupos, para esto se le pregunta
                      al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también en caso de pasar
                      de ronda tiene derecho a elegir qué día jugar.</li>
                  </ul>
                  <?php if (is_user()) : ?>
                    <?php $productPrice = 80; ?>
                    <?php $currency = "USD"; ?>
                    <?php $description = "PASE COLABORADOR PLUS"; ?>
                    <?php $primaryKey = session()->get('user_id'); ?> 
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
                <h2 id="lgold" class="first-title">SPONSOR TEAM GOLD</h2>
                <h1 class="currency"><span class="dollar-sign">&#x24;</span>99 USD</h1>
                <p id="lgincluye" class="month">INCLUYE</p>
                <ul class="items">
                  <li id="lgi1">1 cupo en el torneo</li>
                  <li id="lgi2">Publicación de presentación de equipo confirmado del evento.</li>
                  <li id="lgi3">Publicación de presentación e historia de equipo patrocinador.</li>
                  <li id="lgi4">Logo de equipo patrocinador dentro de publicaciones del torneo y también en el diseño de la transmisión.</li>
                  <li id="lgi5">Entrevista especial para equipo patrocinador para social media y livestreaming.</li>
                  <li id="lgi6">Menciones en las fases del torneo en directo.</li>
                  <li id="lgi7">Posibilidad de jugar con un miembro sin tag(hasta fase de Knockout).</li>
                  <li id="lgi8">Check-In automático.</li>
                  <li id="lgi9">15% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                  <li id="lgi10">Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                  <li id="lgi11">Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                    cuentas de jugadores en reglamento).</li>
                </ul>
                <p id="lgdescribe" class="month">DESCRIPCIÓN</p>
                <ul class="description">
                  <li id="lgd1">Pase de patrocinador con más beneficios para los equipos que lo adquieran.</li>
                  <li id="lgd2">Ya entra como equipos patrocinadores del torneo.</li>
                  <li id="lgd3">Podrá escoger en qué grupo jugar la fase de clasificación siempre y cuando no se hayan hecho los grupos, para esto
                    se le pregunta al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también
                    en caso de pasar de ronda tiene derecho a elegir qué día jugar.</li>
                </ul>
                <?php if (is_user()) : ?>                  
                  <?php $productPrice = 99; ?>
                  <?php $currency = "USD"; ?>                  
                  <?php $description = "SPONSOR TEAM GOLD"; ?> 
                  <?php $primaryKey = session()->get('user_id'); ?> 
                  <div id="paypal-buttonP4"></div>
                  <?php include('paypal/paypalCheckoutP4.php'); ?>
                <?php else : ?>
                  <a class="btn" href="<?= base_url('signup') ?>" title="Get Started">GET STARTED</a>
                <?php endif ?>
              </div>
              <!--End columin-1-->

              <div class="columin-2">
                <center>
                  <h2 id="ldouble" class="first-title">DOUBLE SPONSOR TEAMS GOLD</h2>
                  <h1 class="currency"><span class="dollar-sign">&#x24;</span>170 USD</h1>
                  <p id="ldincluye" class="month">INCLUYE</p>
                  <ul class="items">
                    <li id="ldi1">2 cupos en el torneo</li>
                    <li id="ldi2">Publicación de presentación de equipo confirmado del evento.</li>
                    <li id="ldi3">Publicación de presentación e historia de equipo patrocinador.</li>
                    <li id="ldi4">Logo de equipo patrocinador dentro de publicaciones del torneo y también en el diseño de la transmisión.</li>
                    <li id="ldi5">Entrevista especial para equipo patrocinador para social media y livestreaming.</li>
                    <li id="ldi6">Menciones en las fases del torneo en directo.</li>
                    <li id="ldi7">Posibilidad de jugar con un miembro sin tag(hasta fase de Knockout).</li>
                    <li id="ldi8">Check-In automático.</li>
                    <li id="ldi9">15% de descuento en 1 entrada de un torneo futuro organizado por Scion Esports Series.</li>
                    <li id="ldi10">Posibilidad de escoger en qué grupo jugar en cada fase (siempre y cuando clasifique a la siguiente ronda).</li>
                    <li id="ldi11">Posibilidad de jugar con roster diferente durante las partidas en cada fase (cumpliendo con las reglas y requisitos de
                      cuentas de jugadores en reglamento).</li>
                  </ul>
                  <p id="lddescribe" class="month">DESCRIPCIÓN</p>
                  <ul class="description">
                    <li id="ldd1">Pase de patrocinador con más beneficios para los equipos que lo adquieran.</li>
                    <li id="ldd2">Ya entra como equipos patrocinadores del torneo.</li>
                    <li id="ldd3">Podrá escoger en qué grupo jugar la fase de clasificación siempre y cuando no se hayan hecho los grupos, para esto
                      se le pregunta al colaborador con antelación para que pueda elegir antes de la organización hacer los grupos, también
                      en caso de pasar de ronda tiene derecho a elegir qué día jugar.</li>
                  </ul>
                  <?php if (is_user()) : ?>                    
                    <?php $productPrice = 170; ?>
                    <?php $currency = "USD"; ?>
                    <?php $description = "DOUBLE SPONSOR TEAMS GOLD"; ?>
                    <?php $primaryKey = session()->get('user_id'); ?> 
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