<?php helper('admin'); ?>
<?= $this->include('include_files/header') ?>
<?= $this->include('include_files/navbar') ?>
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

		<!-- Room Slider -->

		<div class="room-slider-wrapper">
			<div class="room-slider js-room-single-slick">
                <div class="room-slider__item" style="background: url(<?=$event->image_url?>)"></div>
				<!--<div class="room-slider__item room-slider__item--img-1"></div>-->
				<!--<div class="room-slider__item room-slider__item--img-2"></div>-->
			</div>

			<!-- Room Title -->
			<div class="single-room-heading">
				<div class="container">
					<h1 class="single-room-heading__title"><?= $event->name ?> </h1>
				</div>
			</div>
			<!-- Room Title / End -->

		</div>
		<!-- Room Slider / End -->

		<!-- Content -->
		<main class="site-content">
			<div class="section-content">
				<div class="container">
                    <?php if (is_admin()) : ?>
                        <div class="row">
                            <div class="w-100 d-flex justify-content-end">
                                <a href="<?= base_url('admin/events/edit/'.$event->id)?>" class="btn btn-primary">Editar</a>
                                <div class="mx-2">
                                    <form action="<?= base_url('admin/events/delete/'.$event->id)?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn bg-danger text-white rounded-0">ELIMINAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
					<!-- Single Room - Content -->
					<div class="single-room-content">
						<div class="row">
							<div class="col-md-3">
								<div class="room__meta-item-value">
									<i class="icon-tag"></i> Categoría: <?= $event->category_name ?>
								</div>
							</div>

							<div class="col-md-4">
								<div class="room__meta-item-value">
									<i class="icon-calendar"></i> <?= $event->date_formatted ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
								<!-- Meta -->
								<div class="room__meta room__meta--lg">
									<div class="room__meta-item room__meta-item--rating">
										<div class="room__meta-item-value">
											<!-- Rating -->
											<div class="room__complexity rating-icons">
												<div class="rating-icons__placeholder">
													<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
												</div>

												<div class="rating-icons__active">
													<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
												</div>
											</div>
											<!-- Rating / End -->

										</div>
										<div class="room__meta-item-label"><?= $event->difficulty_name ?></div>
									</div>

									<div class="room__meta-item">
										<div class="room__meta-item-value">
											<i class="ion-person-stalker"></i> <?= $event->max_participants ?>
										</div>
										<div class="room__meta-item-label">Participantes</div>
									</div>

									<div class="room__meta-item">
										<div class="room__meta-item-value">
											<i class="icon-clock"></i> <?= $event->timezone_offset ?>
										</div>
										<div class="room__meta-item-label"><?= $event->timezone_name ?> </div>
									</div>
								</div>
								<!-- Meta / End -->

								<?php if ($eventDetails) :  ?>
                                    <p><?= $eventDetails->description ?></p>
                                <?php else : ?>
                                <p>No hay una descripción</p>
                                <?php endif ?>

							</div>

							<div class="col-md-4">
								<!-- Room Details -->
								<ul class="room-details">
                                    <?php if ($eventAwards) : ?>
                                        <?php foreach ($eventAwards as $award) : ?>
                                            <li class="room-details__item">
                                                <i class="fas fa-trophy"></i>
                                                <?= $award->name ?> <?= $award->amount ?>
                                            </li>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <li class="room-details__item">
                                            NO HAY PREMIOS
                                        </li>
                                    <?php endif ?>
								</ul>
								<!-- Room Details / End -->

								<a href="#" class="btn btn-primary btn-lg">Registrate Ahora!</a>
							</div>
						</div>

						<br><br>

						<div class="row">
							<div class="col-md-8">
								<!-- Meta -->
								<div class="room__meta room__meta--lg">
									<div class="room__meta-item room__meta-item--rating">
										<div class="room__meta-item-label">
											<h3>Reglas</h3>
										</div>
									</div>
								</div>
								<!-- Meta / End -->

                                <?php if ($eventDetails and $eventDetails->rules) :  ?>
                                    <p><?= $eventDetails->rules ?></p>
                                <?php else : ?>
                                    <p>No se definieron reglas</p>
                                <?php endif ?>
							</div>

							<div class="col-md-4">
								<!-- Room Details -->
								<div class="room__meta-item-label">
									<h3>Estructura</h3>
								</div>

                                <?php if ($eventStages) :?>
                                    <?php foreach ($eventStages as $index => $stage) : ?>
                                        <div class="size-content p-2">
                                            <div class="title"><?= $index + 1 ?>. <?= $stage->name ?></div>
                                            <div class="item"><?= $stage->description ?></div>
                                        </div>
                                    <?php endforeach ?>
                                <?php else : ?>
                                <div>Por definir</div>
                                <?php endif ?>
								<!-- Room Details / End -->
							</div>
						</div>
					</div>
					<!-- Single Room - Content / End -->
				</div>
			</div>

			<!-- Related Rooms -->
			<div class="section-content">
				<div class="container">
					<h2>Otros Eventos</h2>

					<!-- Rooms Grid - 3 cols -->
					<div class="row rooms rooms--grid js-rooms-related slick--arrows-top">
						<!-- Room #9 -->
						<div class="room col-sm-3 col-md-3 room--category-normal">
							<div class="room__inner">
								<div class="room__body">
									<!-- Rating -->
									<div class="room__complexity rating-icons">
										<div class="rating-icons__placeholder">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>
										<div class="rating-icons__active">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>
									</div>
									<!-- Rating / End -->

									<!-- Title -->
									<h2 class="room__title"><a href="room-single.html">Nombre del evento</a></h2>
									<!-- Title / End -->

									<!-- Meta -->
									<div class="room__meta">
										<div class="room__meta-item">
											<i class="ion-person-stalker"></i> 3-4
										</div>
										<div class="room__meta-item">
											<i class="icon-clock"></i> 60
										</div>
										<div class="room__meta-item">
											<i class="ion-location"></i> New York 3031
										</div>
									</div>
									<!-- Meta / End -->
								</div>

								<!-- Image -->
								<figure class="room__img">
									<a href="room-single.html"><img src="<?= base_url('images/samples/room-grid-3-img9.jpg') ?>" alt=""></a>
								</figure>
								<!-- Image / End -->
							</div>
						</div>
						<!-- Room #9 / End -->

						<!-- Room #2 -->
						<div class="room col-sm-3 col-md-3 room--category-hard">
							<div class="room__inner">
								<div class="room__body">
									<!-- Rating -->
									<div class="room__complexity rating-icons">
										<div class="rating-icons__placeholder">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>

										<div class="rating-icons__active">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
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
											<i class="icon-clock"></i> (UTC-06:00)
										</div>

										<div class="room__meta-item">
											<i class="ion-location"></i> Internacional
										</div>
									</div>
									<!-- Meta / End -->
								</div>

								<!-- Image -->
								<figure class="room__img">
									<a href="room-single.html"><img src="<?= base_url('images/samples/room-grid-3-img2.jpg') ?>" alt=""></a>
								</figure>
								<!-- Image / End -->
							</div>
						</div>
						<!-- Room #2 / End -->

						<!-- Room #3 -->
						<div class="room col-sm-3 col-md-3 room--category-easy">
							<div class="room__inner">
								<div class="room__body">
									<!-- Rating -->
									<div class="room__complexity rating-icons">
										<div class="rating-icons__placeholder">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>

										<div class="rating-icons__active">
											<i class="ion-locked"></i><i class="ion-locked"></i>
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
											<i class="icon-clock"></i> (UTC-06:00)
										</div>
										<div class="room__meta-item">
											<i class="ion-location"></i> Internacional
										</div>
									</div>
									<!-- Meta / End -->
								</div>

								<!-- Image -->
								<figure class="room__img">
									<a href="room-single.html"><img src="<?= base_url('images/samples/room-grid-3-img3.jpg') ?>" alt=""></a>
								</figure>
								<!-- Image / End -->
							</div>
						</div>
						<!-- Room #3 / End -->

						<!-- Room #4 -->
						<div class="room col-sm-3 col-md-3 room--category-hard">
							<div class="room__inner">
								<div class="room__body">
									<!-- Rating -->
									<div class="room__complexity rating-icons">
										<div class="rating-icons__placeholder">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>

										<div class="rating-icons__active">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
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
											<i class="icon-clock"></i> (UTC-06:00)
										</div>
										<div class="room__meta-item">
											<i class="ion-location"></i> Internacional
										</div>
									</div>
									<!-- Meta / End -->
								</div>

								<!-- Image -->
								<figure class="room__img">
									<a href="room-single.html"><img src="<?= base_url('images/samples/room-grid-3-img4.jpg') ?>" alt=""></a>
								</figure>
								<!-- Image / End -->
							</div>
						</div>
						<!-- Room #4 / End -->

						<!-- Room #5 -->
						<div class="room col-sm-3 col-md-3 room--category-easy">
							<div class="room__inner">
								<div class="room__body">
									<!-- Rating -->
									<div class="room__complexity rating-icons">
										<div class="rating-icons__placeholder">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>
										<div class="rating-icons__active">
											<i class="ion-locked"></i><i class="ion-locked"></i>
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
											<i class="icon-clock"></i> (UTC-06:00)
										</div>
										<div class="room__meta-item">
											<i class="ion-location"></i> Internacional
										</div>
									</div>
									<!-- Meta / End -->
								</div>

								<!-- Image -->
								<figure class="room__img">
									<a href="room-single.html"><img src="<?= base_url('images/samples/room-grid-3-img5.jpg') ?>" alt=""></a>
								</figure>
								<!-- Image / End -->
							</div>
						</div>
						<!-- Room #5 / End -->

						<!-- Room #6 -->
						<div class="room col-sm-3 col-md-3 room--category-easy">
							<div class="room__inner">
								<div class="room__body">
									<!-- Rating -->
									<div class="room__complexity rating-icons">
										<div class="rating-icons__placeholder">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
										</div>
										<div class="rating-icons__active">
											<i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
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
											<i class="icon-clock"></i> 1(UTC-06:00)
										</div>
										<div class="room__meta-item">
											<i class="ion-location"></i> Internacional
										</div>
									</div>
									<!-- Meta / End -->
								</div>

								<!-- Image -->
								<figure class="room__img">
									<a href="room-single.html"><img src="<?= base_url('images/samples/room-grid-3-img6.jpg') ?>" alt=""></a>
								</figure>
								<!-- Image / End -->
							</div>
						</div>
						<!-- Room #6 / End -->
					</div>
					<!-- Rooms Grid - 3 cols / End  -->
				</div>
			</div>
			<!-- Related Rooms / End -->
		</main>

		<!-- Search Form -->
		<i class="js-search-form-close search-form-close icon-close"></i>
		<form action="#" class="search-form-overlay">
			<div class="search-input">
				<input type="text" name="input-search" class="input-search" placeholder="Enter your search...">
				<button type="submit" class="submit">
					<i class="icon-arrow-right"></i>
				</button>
			</div>
		</form>
		<!-- Search Form / End -->
	</div><!-- .site-wrapper -->
    <?= $this->include('include_files/footer') ?>
</body>