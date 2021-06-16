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
						<form method="post" enctype="multipart/form-data" id="contact-form" action="<?=base_url('teams')?>">
						<?= csrf_field() ?>
							<div class="col-lg-12 ml-lg-auto mr-lg-auto">

								<h2><i class="booked-icon ion-person-stalker"></i> &nbsp; CREAR EQUIPO</h2>
								<hr class="divider-sm">
								<div class="row">
									<div class="vertical-center ">
										<div class="col-lg-12">
											<figure class="room__img">
												<h4>Agregar logo aquí</h4>
											</figure>
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
														<input class="text-input form-control" name="name" type="text" id="name" placeholder="">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="nlider">Manager:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" type="text" id="username" placeholder="Username...">
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
														<input class="text-input form-control" name="discord_url" type="text" id="discord" placeholder="">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="whatsapp">WhatsApp Manager:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="whatsapp_number" type="text" id="whatsapp" placeholder="">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group form-group--lg form-password">
														<label for="correo">Correo:</label>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="email" type="email" id="email" placeholder="">
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
									<div class="col-lg-8 offset-md-1">
										<div id="" class="tab-pane booked-tab-content  bookedClearFix" role="tabpanel" aria-labelledby="profile-edit-tab">
											<div class="row">

												<div class="col-md-2">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="id_part1" type="number" placeholder="ID" style="width: 100px; text-align: center;" />
													</div>
												</div>
												<div class="col-md-9">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="part1" type="text" id="part1" placeholder="Participante N° 1">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="id_part2" type="number" placeholder="ID" style="width: 100px; text-align: center;" />
													</div>
												</div>
												<div class="col-md-9">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="part2" type="text" id="part2" placeholder="Participante N° 2">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="id_part3" type="number" placeholder="ID" style="width: 100px; text-align: center;" />
													</div>
												</div>
												<div class="col-md-9">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="part3" type="text" id="part3" placeholder="Participante N° 3">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="id_part4" type="number" placeholder="ID" style="width: 100px; text-align: center;" />
													</div>
												</div>
												<div class="col-md-9">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="part4" type="text" id="part4" placeholder="Participante N° 4">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="id_part5" type="number" placeholder="ID" style="width: 100px; text-align: center;" />
													</div>
												</div>
												<div class="col-md-9">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="part5" type="text" id="part5" placeholder="Participante N° 5">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="id_part6" type="number" placeholder="ID" style="text-align: center;" />
													</div>
												</div>
												<div class="col-md-9">
													<div class="form-group form-group--lg form-password">
														<input class="text-input form-control" name="part6" type="text" id="part6" placeholder="Participante N° 6">
													</div>
												</div>

												<div class="form-group form-group--lg form-nickname">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="rememberme">
														<label class="custom-control-label" for="rememberme">He leído y acepto los</label> <a href="">Terminos y condiciones</a>
													</div>
												</div>

											</div>
											<div class="form-submit ">
												<input name="updateuser" type="submit" id="updateuser" class="btn btn-lg btn-primary" value="Crear Equipo">
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