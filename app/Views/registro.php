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

			<div class="section-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 ml-lg-auto mr-lg-auto">
							<div class="row">
								<div class="vertical-center ">
									<div class="col-lg-12">
										<figure class="room__img">
											<a href="room-single.html"><img src="<?= base_url('images/logo.png') ?>" alt=""></a>
										</figure>
										<hr class="divider">
										<p>
											<label>Ya tienes una cuenta? <a href="<?= base_url('login') ?>">Inicia Sesión</a></label>
										</p>
									</div>
								</div>

								<div class="col-lg-7 offset-md-1">
									<div id="" class="tab-pane booked-tab-content  bookedClearFix" role="tabpanel" aria-labelledby="profile-edit-tab">
										<h2><i class="booked-icon ion-edit"></i> &nbsp; Registro</h2>
										<form method="post" enctype="multipart/form-data" id="contact-form" action="<?= base_url('signup/new') ?>">
                                            <?= csrf_field() ?>
                                            <div class="row">
												<div class="col-md-12">
													<div class="form-group form-group--lg form-avatar">
														<label for="avatar">Datos Personales</label>
													</div><!-- .form-nickname -->
												</div>

												<div class="col-md-6">
													<div class="form-group form-group--lg form-password">
                                                        <input class="text-input form-control" name="first_name" type="text" id="first_name" placeholder="Nombre*" required>
													</div><!-- .form-password -->
												</div>

												<div class="col-md-6">
													<div class="form-group form-group--lg form-password last">
														<input class="text-input form-control" name="last_name" type="text" id="last_name" placeholder="Apellidos*" required>
													</div><!-- .form-password -->
												</div>

												<div class="col-md-6">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="birthdate" type="date" id="birthdate" placeholder="Nombre" required>
													</div><!-- .form-password -->
												</div>

												<div class="col-md-6">
													<div class="form-group form-group--lg form-password last">
														<input class="text-input form-control" name="genre" type="text" id="genre" placeholder="Sexo*" required>
													</div><!-- .form-password -->
												</div>

											</div>

											<div class="form-group form-group--lg form-nickname">
												<label for="nickname">Datos de la Cuenta</label>
												<input class="text-input form-control" name="email" type="email" id="email" placeholder="tucorreo@domain.com*" required>
                                                <?php if (session()->get('errors')) : ?>
                                                    <?php if (! empty(session()->get('errors')['email'])) : ?>
                                                    <p class="text-danger"><?= session()->get('errors')['email'] ?></p>
                                                    <?php endif ?>
                                                <?php endif ?>
												<input class="text-input form-control" name="confirm_email" type="email" id="email_confirm" placeholder="Repite correo*" required>
                                                <?php if (session()->get('errors')) : ?>
                                                    <?php if (! empty(session()->get('errors')['confirm_email'])) : ?>
                                                        <p class="text-danger"><?= session()->get('errors')['confirm_email'] ?></p>
                                                    <?php endif ?>
                                                <?php endif ?>
											</div>

											<div class="form-group form-group--lg form-nickname">
												<label for="nickname">Nombre de usuario</label>
												<input class="text-input form-control" name="username" type="text" id="username" placeholder="nickname*" required>
                                                <?php if (session()->get('errors')) : ?>
                                                    <?php if (! empty(session()->get('errors')['username'])) : ?>
                                                        <p class="text-danger"><?= session()->get('errors')['username'] ?></p>
                                                    <?php endif ?>
                                                <?php endif ?>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="password" type="password" id="pass1" placeholder="Ingresa Contraseña*" required>
                                                        <?php if (session()->get('errors')) : ?>
                                                            <?php if (! empty(session()->get('errors')['password'])) : ?>
                                                                <p class="text-danger"><?= session()->get('errors')['password'] ?></p>
                                                            <?php endif ?>
                                                        <?php endif ?>
													</div><!-- .form-password -->
												</div>

												<div class="col-md-6">
													<div class="form-group form-group--lg form-password last">
														<input class="text-input form-control"  name="confirm_password" type="password" id="pass2" placeholder="Repite Contraseña*" required>
													</div><!-- .form-password -->
												</div>
                                                <?php if (session()->get('errors')) : ?>
                                                    <?php if (! empty(session()->get('errors')['confirm_password'])) : ?>
                                                        <p class="text-danger"><?= session()->get('errors')['confirm_password'] ?></p>
                                                    <?php endif ?>
                                                <?php endif ?>
											</div>

											<div class="form-group form-group--lg form-nickname">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="rememberme" required>
													<label class="custom-control-label" for="rememberme">He leído y acepto los</label> <a href="">Terminos y condiciones</a>
												</div>
											</div>

											<div class="form-submit ">
												<input type="submit" class="btn btn-lg btn-primary" value="Registrarse">
											</div><!-- .form-submit -->
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
</body>