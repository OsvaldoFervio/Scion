 <!-- Footer
    ================================================== -->
    <footer id="footer" class="footer">
    
      <!-- Footer Widget -->
      <div class="footer-widgets">
        <div class="container">
          <div class="col-xs-12 col-sm-12 col-lg-12">
              <!-- Widget: Social Links -->
              
              <div class="widget widget--footer widget-social">                
                <div class="widget__content">
                  <ul class="social-links social-links--circle">
                    <li class="social-links__item">
                      <a class="social-links__link" href="https://www.facebook.com/scionesps/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>                   
                    <li class="social-links__item">
                      <a class="social-links__link" href="https://www.instagram.com/scionesportsseries/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>                   
                    <li class="social-links__item">
                      <a class="social-links__link" href="https://discord.com/invite/h7wrFQP" target="_blank"><i class="fab fa-discord"></i></a>
                    </li>                   
                  </ul>
                </div>
              </div>
              
              <!-- Widget: Social Links / End -->
            </div>
          <div class="row footer-widgets__row footer-widgets__row--is-numbered">

            <div class="col-xs-12 col-sm-6 col-lg-3">
              <!-- Widget: Links -->
              <div class="widget widget--footer widget_nav_menu">
                <div class="widget__header">
                  <h4 id="lfmapa" class="widget__title">Mapa del sitio</h4>
                </div>
                <div class="widget__content">
                  <ul>
                    <li><a id="lfinicio" href="<?= base_url('Home') ?>">Inicio</a></li>
                    <li><a id="lfsesion" href="<?= base_url('login') ?>">Iniciar Sesión</a></li>
                    <li><a id="lfregistro" href="<?= base_url('signup') ?>">Registro</a></li>
                    
                  </ul>
                </div>
              </div>
              <!-- Widget: Links / End -->
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
              <!-- Widget: Links -->
              <div class="widget widget--footer widget_nav_menu">
                <div class="widget__header">
                  <h4 id="lftorneos" class="widget__title">Torneos y Eventos</h4>
                </div>
                <div class="widget__content">
                  <ul>
                    <li><a id="lfeventos" href="<?= base_url('Home/eventos') ?>">Eventos</a></li>
                  </ul>
                </div>
              </div>
              <!-- Widget: Links / End -->
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
              <!-- Widget: Links -->
              <div class="widget widget--footer widget_nav_menu">
                <div class="widget__header">
                  <h4 id="lfmas" class="widget__title">Más</h4>
                </div>
                <div class="widget__content">
                  <ul>
                    <li><a id="lfequipo" href="<?= base_url('Home/equipos') ?>">Crea tu equipo</a></li>
                    <li><a id="lfposicion" href="<?= base_url('Home/tabposicion') ?>">Tabla Posiciones</a></li>
                    <li><a id="lfayuda" href="#">Ayuda</a></li>
                  </ul>
                </div>
              </div>
              <!-- Widget: Links / End -->
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
              <!-- Widget: Address -->
              <div class="widget widget--footer widget_nav_menu">
                <div class="widget__header">
                  <h4 id="lmcontacto" class="widget__title">Contacto</h4>
                </div>
                <div class="widget__content">
                  <address>                       
                    <a href="mailto:contacto@scionesps.com">
                      <i class="icon-envelope">&nbsp|&nbsp</i>
                      <span class="link-label">contacto@scionesps.com</span>
                    </a>
                      </br>
                    <a href="tel:123-456-7890p52"></a>                    
                      <i class="icon-phone">&nbsp|&nbsp</i>
                      <span class="link-label">+ 52 123 456 7890</span>
                    </a>
                    
                  </address>
                </div>
              </div>
              <!-- Widget: Address / End -->
            </div>
            
          </div>
        </div>
      </div>
      <!-- Footer Widgets / End -->
    
      <!-- Footer Copyright -->
      <div class="footer-copyright">
        <div class="container">   
         
          <!-- Logo - Image Based / End -->
    
          <div class="footer-copyright__txt">
            Copyright &copy; 2021 Scion Esports &nbsp;|&nbsp; All Rights Reserved 
          </br>
            <a id="lmterminos" class="linka">Terminos y Condiciones</a>
          </div>
        </div>
      </div>
      <!-- Footer Copyright / End -->
    </footer>
    <!-- Footer / End -->

     <!-- Javascript Files
  ================================================== -->
  <!-- Vendors JS -->
  <!-- <?= base_url('images/favicon.png') ?> -->
  <script src="<?= base_url('vendor/jquery/jquery.min.js' ) ?>"></script>
  <script src="<?= base_url('vendor/jquery/jquery-migrate.min.js' ) ?>"></script>
  
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js' ) ?>"></script>
  <script defer src="<?= base_url('fonts/font-awesome/js/all.min.js' ) ?>"></script>
  <!--<script src="<?= base_url('/maps.googleapis.com/maps/api/js?key=YOUR_API_KEY' ) ?>"></script>-->
  <script src="<?= base_url('vendor/gmap3/dist/gmap3.min.js' ) ?>"></script>
  
  <!-- Core JS -->
  <script src="<?= base_url('js/core.js')?>"></script>
  
  <!-- Template JS -->
  <script src="<?= base_url('js/init.js')?>"></script>

  <script src="<?= base_url('js/translator/ctranslator.js')?>"></script>