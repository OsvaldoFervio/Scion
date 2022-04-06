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

		<!-- Content -->
		<main class="site-content">

			<div class="section-content">
				<div class="container">
					<?php if(session('success')) : ?>
						<div class="alert alert-success">
							<?= session()->get('success') ?>
						</div>
					<?php endif ?>
					<?php if(session('errors')) : ?>
					<div class="alert alert-danger">
						<ul class="m-0">
						<?php foreach(session()->get('errors') as $error) : ?>
							<li><?= esc($error) ?></li>
						<?php endforeach ?>
						</ul>
					</div>
					<?php endif ?>
					<div class="row">
						<form method="post" enctype="multipart/form-data" id="contact-form" action="<?=base_url('teams/create')?>">
						<?= csrf_field() ?>
							<div class="col-lg-12 ml-lg-auto mr-lg-auto">

								<h2><i class="booked-icon ion-person-stalker"></i> &nbsp; CREAR EQUIPO</h2>
								<hr class="divider-sm">
								<div class="row">
									<div class="vertical-center ">
										<div class="col-lg-12">
											<h4>Agregar logo aquí</h4>
											<figure class="text-center">
												<img id="image" alt="Team Image" class="d-none" width="150" height="150">
											</figure>
											<input type="file" name="images" id="image-input" accept="image/jpeg,image/png,image/jpg">
											<hr class="divider">
										</div>
									</div>

									<div class="col-lg-7 offset-md-1">
										<div id="" class="tab-pane booked-tab-content  bookedClearFix" role="tabpanel" aria-labelledby="profile-edit-tab">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group form-group--lg form-avatar">
														<label for="datos">DATOS REQUERIDOS</label>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="nequipo">Equipo:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="name" type="text" id="name" required>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="nlider">Manager:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" type="text" id="username" placeholder="Username..." required data-username-type="manager">
														<input type="hidden" name="manager_id" type="text" id="manager_id">
													</div>
													<div class="px-4 py-1 rounded-sm overflow-auto d-none" style="height: 100px; background: rgba(0, 0, 0, 0.5);" id="users-list"></div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="discord">Discord:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="discord_url" type="text" id="discord">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="whatsapp">WhatsApp Manager:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="whatsapp_number" type="text" id="whatsapp" required>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="correo">Correo:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="email" type="email" id="email" required>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="pais">País:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<select class="text-input form-control" name="country_id" type="text" id="country_id" style="height: auto; width: 180px;">
														<option value="0" selected disabled>Selecciona un país</option>
														<?php foreach($countries as $country) : ?>
														<option value="<?=$country->id?>"><?=$country->name?></option>
														<?php endforeach; ?>
														</select>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>

							<br><br>
							<p>&nbsp;&nbsp;</p>

							<div class="col-lg-12 ml-lg-auto mr-lg-auto">
								<h2><i class="booked-icon ion-person"></i> &nbsp; PARTICIPANTES</h2>
								<hr class="divider-sm">
								<div class="row">
									<div class="col-lg-9 offset-md-1">
										<div id="" class="tab-pane booked-tab-content  bookedClearFix" role="tabpanel" aria-labelledby="profile-edit-tab">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<input class="form-control col-md-6" type="text" id="username-p" placeholder="Username..." data-username-type="participant">
														<button type="button" class="btn btn-info col-md-2" id="btn-search">Buscar</button>
														<span class="col-md-4 vertical-center border-0">Agrega 4 mínimo y 6 máximo de participantes</span>
													</div>
													<div class="text-danger d-none" id="alert-result">No se encontró el usuario</div>
												</div>
											</div>
											<div class="mt-2 mb-4" id="participants-lits"></div>
											<div class="form-group form-group--lg form-nickname">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="terms" required>
													<label class="custom-control-label" for="terms">He leído y acepto los</label> <a href="">Terminos y condiciones</a>
												</div>
											</div>
											<div class="form-submit mt-2">
												<input type="submit" id="btnCreate" class="btn btn-lg btn-primary" value="Crear Equipo" disabled>
											</div>

										</div>
									</div>
								</div>
							</div>
						</form>
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
	<script>
		var BASE_URL = "<?=base_url('api/users')?>"
	</script>
	<script src="<?=base_url('js/teams.js')?>"></script>
</body>