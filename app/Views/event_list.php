<body>
    <div class="site-wrapper">
        <main class="site-content">
            <div class="section-content">
                <div class="container">
                    <ul class="filter js-filter list-unstyled">
                        <li class="filter__item"><button class="filter__link btn btn-primary" data-filter="*">Todos</button></li>
                        <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-easy">Easy</button></li>
                        <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-normal">Normal</button></li>
                        <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-hard">Hard</button></li>
                    </ul>
                    <?php if(session()->get('user_id')) : ?>
                    <a href="<?= base_url('events/new')?>" class="btn btn-primary">Nuevo</a>
                    <?php endif ?>
                    <div class="row rooms rooms--grid js-rooms--grid">
                        <div class="room col-sm-6 col-md-3 room--category-normal">
                            <div class="room__inner">
                                <div class="room__body">
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
                                    <h2 class="room__title"><a href="room-single.html">Nombre del Evento</a><span> $25 USD</span></h2>
                                    <!-- Title / End -->

                                    <!-- Meta -->
                                    <div class="room__meta">
                                        <div class="room__meta-item">
                                            <i class="ion-calendar"></i>01/07/2020
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-person-stalker"></i> 5-6
                                        </div>
                                        <div class="room__meta-item">
                                            <i class="ion-location"></i> México
                                        </div>
                                    </div>
                                    <!-- Meta / End -->
                                </div>
                                <!-- Image -->

                                <figure class="room__img">
                                    <a href="room-single.html"><img src="<?= base_url('/images/samples/room-grid-4-img1.jpg') ?>" alt=""></a>
                                </figure>
                                <!-- Image / End -->
                            </div>
                        </div>
                        <div class="room col-sm-6 col-md-3 room--category-hard">
                            <div class="room__inner">
                                <div class="room__body">
                                    <!-- Rating -->
                                    <div class="room__complexity rating-icons">
                                        <div class="rating-icons__placeholder">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div>

                                        <div class="rating-icons__active">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <!-- Rating / End -->

                                    <!-- Title -->
                                    <h2 class="room__title"><a href="room-single.html">Nombre del Evento</a><span> $25 USD</span></h2>
                                    <!-- Title / End -->

                                    <!-- Meta -->
                                    <div class="room__meta">
                                        <div class="room__meta-item">
                                            <i class="ion-calendar"></i>01/07/2020
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-person-stalker"></i> 5-6
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-location"></i> México
                                        </div>
                                    </div>
                                    <!-- Meta / End -->
                                </div>

                                <!-- Image -->
                                <figure class="room__img">
                                    <a href="room-single.html"><img src="<?= base_url('/images/samples/room-grid-4-img2.jpg') ?>" alt=""></a>
                                </figure>
                                <!-- Image / End -->
                            </div>
                        </div>
                        <!-- Room #2 / End -->

                        <!-- Room #3 -->
                        <div class="room col-sm-6 col-md-3 room--category-easy">
                            <div class="room__inner">
                                <div class="room__body">
                                    <!-- Rating -->
                                    <div class="room__complexity rating-icons">
                                        <div class="rating-icons__placeholder">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div>

                                        <div class="rating-icons__active">
                                            <i class="ion-star"></i><i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <!-- Rating / End -->

                                    <!-- Title -->
                                    <h2 class="room__title"><a href="room-single.html">Nombre del Evento</a><span> $25 USD</span></h2>
                                    <!-- Title / End -->

                                    <!-- Meta -->
                                    <div class="room__meta">
                                        <div class="room__meta-item">
                                            <i class="ion-calendar"></i>01/07/2020
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-person-stalker"></i> 5-6
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-location"></i> México
                                        </div>
                                    </div>
                                    <!-- Meta / End -->
                                </div>

                                <!-- Image -->
                                <figure class="room__img">
                                    <a href="room-single.html"><img src="<?= base_url('/images/samples/room-grid-4-img3.jpg') ?>" alt=""></a>
                                </figure>
                                <!-- Image / End -->
                            </div>
                        </div>
                        <!-- Room #3 / End -->

                        <!-- Room #4 -->
                        <div class="room col-sm-6 col-md-3 room--category-hard">
                            <div class="room__inner">
                                <div class="room__body">
                                    <!-- Rating -->
                                    <div class="room__complexity rating-icons">
                                        <div class="rating-icons__placeholder">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div>

                                        <div class="rating-icons__active">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div>
                                    </div>

                                    <!-- Rating / End -->
                                    <!-- Title -->
                                    <h2 class="room__title"><a href="room-single.html">Nombre del Evento</a><span> $25 USD</span></h2>
                                    <!-- Title / End -->

                                    <!-- Meta -->
                                    <div class="room__meta">
                                        <div class="room__meta-item">
                                            <i class="ion-calendar"></i>01/07/2020
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-person-stalker"></i> 5-6
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-location"></i> México
                                        </div>
                                    </div>
                                    <!-- Meta / End -->
                                </div>

                                <!-- Image -->
                                <figure class="room__img">
                                    <a href="room-single.html"><img src="<?= base_url('/images/samples/room-grid-4-img4.jpg') ?>" alt=""></a>
                                </figure>
                                <!-- Image / End -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>