<body>

  <div class="site-wrapper">
    <div id="js-preloader-overlay" class="preloader-overlay">
      <div id="js-preloader" class="preloader"></div>
    </div>

    <!-- Overlay -->
    <div class="site-overlay"></div>
    <!-- Overlay / End -->

    <!-- Main Slider -->
    <div class="main-slider-wrapper">
      <div class="main-slider js-main-slider">
      </div>
    </div>

    <!-- Main Slider / End -->
    <!-- Content -->

    <main class="site-content">
      <!-- Section: Featured Rooms -->
      <div class="section-content">

        <div class="container">
          <div class="row">
            <div class="col-md-10 ml-md-auto mr-md-auto">
              <div class="section-heading section-heading--divider-bottom">
                <h2 class="section-heading__title" data-aos="fade" data-aos-duration="600">Top 5 de la Semana</h2>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10 ml-md-auto mr-md-auto">
              <!-- Rooms - List -->
              <div class="rooms rooms--list">
                <!-- Room #1 -->
                <div class="room" data-aos="fade-up" data-aos-duration="800">
                  <div class="room__body">
                    <!-- Header -->
                    <header class="room__header">
                      <!-- Rating -->
                      <div class="room__complexity rating-icons">
                        <div class="rating-icons__placeholder">
                          <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                        </div>
                        <div class="rating-icons__active">
                          <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                        </div>
                      </div>
                      <!-- Rating / End -->

                      <!-- Title -->
                      <h2 class="room__title"><a href="room-single.html">Nombre del evento</a></h2>
                      <!-- Title / End -->

                      <!-- Meta -->
                      <div class="room__meta">
                        <div class="room__meta-item">
                          <i class="ion-person-stalker"></i> 6
                        </div>
                        <div class="room__meta-item">
                          <i class="icon-clock"></i> 60
                        </div>
                        <div class="room__meta-item">
                          <i class="ion-location"></i> Internacional
                        </div>
                      </div>
                      <!-- Meta / End -->
                    </header>
                    <!-- Header / End -->

                    <!-- Excerpt -->
                    <div class="room__excerpt">
                      <p>Descripción breve del evento, regla principal y posibles premios.</p>
                    </div>
                    <!-- Excerpt / End -->

                    <!-- Read More -->
                    <footer class="room__footer">
                      <a href="room-single.html" class="btn btn-primary">Detalles</a>
                    </footer>
                    <!-- Read More / End -->
                  </div>

                  <!-- Image -->
                  <figure class="room__img">
                    <a href="room-single.html"><img src="images/samples/room-list-1.jpg" alt=""></a>
                  </figure>
                  <!-- Image / End -->
                </div>
                <!-- Room #1 / End -->

                <div class="row">                  
                  <ul id="instagram-feed-tagged" class="widget-instagram__list widget-instagram__list--gutter-xs widget-instagram__list--4cols">
                    <?php
                    $contar = 0;
                    foreach ($events as $event) :
                      $contar++;
                    ?>
                      <li class="widget-instagram__item aos-init aos-animate" data-aos="zoom-in" data-aos-duration="600">
                        <a href="<?= base_url('events/' . $event->id) ?>" class="widget-instagram__link-wrapper" target="_blank">
                          <span class="widget-instagram__plus-sign">
                            <?php if ($event->image_url) : ?>
                              <img src="<?= $event->image_url ?>" alt="" class="widget-instagram__img">
                            <?php else : ?>
                              <img src="<?= base_url('/images/event.png') ?>" alt="" class="widget-instagram__img">
                            <?php endif ?>
                            <span class="widget-instagram__item-meta">
                              <h3 class="room__title"><?= strtoupper($event->name) ?></h3>
                              <span class="widget-instagram__item-meta-likes"><i class="ion-person-stalker"></i> <?= $event->min_participants ?>-<?= $event->max_participants ?></span>
                            </span>
                          </span>
                        </a>

                        <?php if ($event->type_id == 3) : ?>
                          <div class="room__meta-item">
                            <i class="ion-location"></i> <?= $event->country_name ?>
                          </div>
                        <?php else : ?>
                          <div class="room__meta-item">
                            <i class="ion-location"></i> <?= $event->type_name ?>
                          </div>
                        <?php endif ?>
                      </li>
                    <?php
                      if ($contar == 4)
                        break;

                    endforeach
                    ?>
                  </ul>
                </div>
              </div>
              <!-- Rooms - List / End  -->
              <div>
                <hr class="divider">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Section: Featured Rooms / End -->

      <!-- Section: Latest Blog Posts -->
      <div class="section-content">
        <div class="container">
          <!-- Filter -->
          <ul class="filter js-filter list-unstyled">
            <li class="filter__item"><button class="filter__link btn btn-primary" data-filter="*">Todos</button></li>
            <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-easy">Easy</button></li>
            <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-normal">Normal</button></li>
            <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-hard">Hard</button></li>
          </ul>
          <!-- Filter / End -->

          <!-- Rooms Grid - 4 cols -->
          <div class="row rooms rooms--grid js-rooms--grid">           
            <?php foreach ($events as $event) : ?>
              <div class="room col-sm-6 col-md-3 room--category-<?= strtolower($event->difficulty_name) ?>">
                <div class="room__inner">
                  <div class="room__body">
                    <!-- Rating -->
                    <div class="room__complexity rating-icons">
                      <!--<div class="rating-icons__placeholder">
                        <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                      </div>

                      <div class="rating-icons__active">
                        <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                      </div>-->
                    </div>
                    <!-- Rating / End -->

                    <!-- Title -->
                    <h3 class="room__title"><a href="<?= base_url('events/' . $event->id) ?>"><?= strtoupper($event->name) ?></a></br><span> $25 USD</span></br></br></h3>
                    <!-- Title / End -->

                    <!-- Meta -->
                    <div class="room__meta">
                      <div class="room__meta-item">
                        <i class="ion-calendar"></i><?= $event->date ?>
                      </div>

                      <div class="room__meta-item">
                        <i class="ion-person-stalker"></i> <?= $event->min_participants ?>-<?= $event->max_participants ?>
                      </div>
                      <?php if ($event->type_id == 3) : ?>
                        <div class="room__meta-item">
                          <i class="ion-location"></i> <?= $event->country_name ?>
                        </div>
                      <?php else : ?>
                        <div class="room__meta-item">
                          <i class="ion-location"></i> <?= $event->type_name ?>
                        </div>
                      <?php endif ?>
                    </div>
                    <!-- Meta / End -->
                  </div>
                  <!-- Image -->

                  <figure class="room__img">
                    <?php if ($event->image_url) : ?>
                      <a href="<?= base_url('events/' . $event->id) ?>"><img src="<?= $event->image_url ?>" alt=""></a>
                    <?php else : ?>
                      <a href="<?= base_url('events/' . $event->id) ?>"><img src="<?= base_url('/images/event.png') ?>" alt=""></a>
                    <?php endif ?>
                  </figure>
                  <!-- Image / End -->
                </div>
              </div>
            <?php endforeach ?>
          </div>
          <?= $pager->links() ?>
          <!-- Rooms Grid - 4 cols / End  -->

          <!-- Blog Navigation 
          <nav aria-label="Room navigation">
            <ul class="pagination pagination--circle justify-content-center">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">10</a></li>
            </ul>
          </nav>
           Blog Navigation / End -->
        </div>
      </div>
      <!-- Section: Latest Blog Posts / End -->
    </main>

    <!-- Search Form -->
    <i class="js-search-form-close search-form-close icon-close"></i>
    <form action="#" class="search-form-overlay">
      <div class="search-input">
        <input type="text" name="input-search" class="input-search" placeholder="Ingresa evento a buscar...">
        <button type="submit" class="submit">
          <i class="icon-arrow-right"></i>
        </button>
      </div>
    </form>
    <!-- Search Form / End -->

  </div><!-- .site-wrapper -->
</body>