<body>
	<div class="site-wrapper">
		<div id="js-preloader-overlay" class="preloader-overlay">
			<div id="js-preloader" class="preloader"></div>
		</div>
		<!-- Overlay -->
		<div class="site-overlay"></div>
		<!-- Overlay / End -->

		<!-- Content -->
		<main class="site-content fondo2">
			<div class="section-content">
				<div class="container">
					<div class="row">
						<div class="col-md-8 ml-md-auto mr-md-auto">
							<div id="booked-profile-page">
								<div id="booked-page-form">

									<ul class="booked-tabs nav login bookedClearFix" id="booked-tabs" role="tablist">
										<li><a href="#profile-login" id="profile-login-tab" data-toggle="tab" role="tab" aria-selected="true" class="active"><i class="booked-icon ion-locked"></i>Iniciar Sesión</a></li>
										<li><a href="#profile-forgot" id="profile-forgot-tab" data-toggle="tab" role="tab" aria-selected="false"><i class="booked-icon ion-help-buoy"></i>Recuperar contraseña</a></li>
									</ul>

									<div class="tab-content">
										<div id="profile-login" class="booked-tab-content tab-pane fade show active" role="tabpanel" aria-labelledby="profile-login-tab">
											<div class="booked-form-wrap bookedClearFix">
												<form id="loginform" action="<?= base_url('login') ?>" method="post">

													<div class="form-group login-username">
														<input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
													</div>

													<div class="form-group login-password">
														<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
													</div>

													<div class="login-remember">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="rememberme">
															<label class="custom-control-label" for="rememberme">Recordarme</label>
														</div>
													</div>

													<div class="login-submit">
														<input type="submit" id="wp-submit" class="btn btn-lg btn-primary" value="Iniciar">
													</div>

												</form>
											</div>
										</div>

										<div id="profile-forgot" class="booked-tab-content fade tab-pane" role="tabpanel" aria-labelledby="profile-forgot-tab">
											<div class="booked-form-wrap bookedClearFix">
												<form method="get" action="#" class="wp-user-form">
													<div class="form-group">
														<input type="text" name="user_login_forgot" class="form-control" value="" size="20" id="user_login_forgot" tabindex="1001" placeholder="¿Cuál es tu email?">
													</div>
													<input type="submit" name="user-submit" value="Enviar" class="user-submit btn btn-lg btn-primary" tabindex="1002">
												</form>
											</div>
										</div>
                                        <?php if(session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger text-center">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                        <?php endif ?>
									</div>
								</div><!-- END #booked-page-form -->
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
		</form><!-- Search Form / End -->
	</div><!-- .site-wrapper -->
</body>