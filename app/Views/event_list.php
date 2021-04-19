<?php helper('admin'); ?>
<body>
    <div class="site-wrapper">
        <main class="site-content">
            <div class="section-content">
                <div class="container">
                    <?php if(session()->get('success')) : ?>
                        <div class="alert alert-success">Evento eliminado correctamente</div>
                    <?php endif ?>
                    <ul class="filter js-filter list-unstyled">
                        <li class="filter__item"><button class="filter__link btn btn-primary" data-filter="*">Todos</button></li>
                        <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-easy">Easy</button></li>
                        <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-normal">Normal</button></li>
                        <li class="filter__item"><button class="filter__link btn btn-outline-secondary" data-filter=".room--category-hard">Hard</button></li>
                    </ul>
                    <?php if(is_admin()) : ?>
                    <a href="<?= base_url('admin/events/new')?>" class="btn btn-primary">Nuevo</a>
                    <?php endif ?>
                    <div class="row rooms rooms--grid js-rooms--grid">
                        <?php foreach ($events as $event) : ?>
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
                                    <h2 class="room__title"><a href="room-single.html"><?= $event->name ?></a><span> $25 USD</span></h2>
                                    <!-- Title / End -->

                                    <!-- Meta -->
                                    <div class="room__meta">
                                        <div class="room__meta-item">
                                            <i class="ion-calendar"></i><?= $event->date ?>
                                        </div>

                                        <div class="room__meta-item">
                                            <i class="ion-person-stalker"></i> <?= $event->min_participants ?>-<?= $event->max_participants ?>
                                        </div>
                                        <?php if($event->type_id == 3) : ?>
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
                                    <?php if($event->image_url) : ?>
                                        <a href="<?= base_url('events/'.$event->id) ?>"><img src="<?= $event->image_url ?>" alt=""></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('events/'.$event->id) ?>"><img src="<?= base_url('/images/samples/room-grid-4-img1.jpg') ?>" alt=""></a>
                                    <?php endif ?>
                                </figure>
                                <!-- Image / End -->
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>