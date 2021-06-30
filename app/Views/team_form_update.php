<?= $this->include('include_files/header') ?>
<?= $this->include('include_files/navbar') ?>
<body>
    <div class="site-wrapper">
        <main class="site-content">
            <div class="section-content p-5">
                <div class="container">
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
                        <form method="post" enctype="multipart/form-data" action="<?=base_url('teams/update/'.$team->id)?>">
                        <?= csrf_field() ?>
                            <input name="_method" value="PUT" hidden>
                            <div class="col-lg-12 ml-lg-auto mr-lg-auto">

                                <h2><i class="booked-icon ion-person-stalker"></i> &nbsp; EDITAR EQUIPO</h2>
                                <hr class="divider-sm">
                                <div class="row">
                                    <div class="vertical-center ">
                                        <div class="col-lg-12">
                                            <h4>Agregar logo aquí</h4>
                                            <figure class="text-center">
                                                <img id="image" src="<?=$team->image_url?>" alt="Team Image" width="150" height="150">
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
                                                        <input class="text-input form-control" name="name" type="text" id="name" value="<?=$team->name?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group form-group--lg form-password">
                                                        <label for="nlider">Manager:</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group form-group--lg form-password">
                                                        <input class="text-input form-control" type="text" id="username" placeholder="Username..." value="<?=$members['manager']->username ?? ''?>" required data-username-type="manager">
                                                        <input type="hidden" name="manager_id" type="text" id="manager_id" value="<?=$members['manager']->id ?? ''?>">
                                                        <?php //?? = https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op ?>
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
                                                        <input class="text-input form-control" name="discord_url" type="text" id="discord" value="<?=$team->discord_url?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group form-group--lg form-password">
                                                        <label for="whatsapp">WhatsApp Manager:</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group form-group--lg form-password">
                                                        <input class="text-input form-control" name="whatsapp_number" type="text" id="whatsapp" value="<?=$team->whatsapp_number?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group form-group--lg form-password">
                                                        <label for="correo">Correo:</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group form-group--lg form-password">
                                                        <input class="text-input form-control" name="email" type="email" id="email" value="<?=$team->email?>" required>
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
                                                        <?php if($country->id == $team->country_id): ?>
                                                            <option value="<?=$country->id?>" selected><?=$country->name?></option>
                                                        <?php else: ?>
                                                            <option value="<?=$country->id?>"><?=$country->name?></option>
                                                        <?php endif ?>
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
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <input class="form-control col-md-6" type="text" id="username-p" placeholder="Username..." data-username-type="participant">
                                                        <span class="col-md-6 vertical-center border-0">Agrega 4 mínimo y 6 máximo de participantes</span>
                                                    </div>
                                                    <div class="px-4 py-1 rounded-sm overflow-auto d-none" style="height: 100px; background: rgba(0, 0, 0, 0.5);" id="users-list-p"></div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-4" id="participants-lits">
                                                <?php foreach($members['participants'] as $index=>$member): ?>
                                                    <div class="row">
                                                        <input value="<?=$member->id?>" name="user_id[]" id="participant-<?=$index?>" hidden>
                                                        <div class="col-md-12">
                                                            <div class="row px-2">
                                                                <span class="col-md-1 pl-4 border-0 vertical-center text-end"><?=$index?></span>
                                                                <div class="col-md-2 form-control col-md-2 tex-center text-white" style="background: rgba(0, 0, 0, 0.5);">
                                                                    <?=$member->username?>
                                                                </div>
                                                                <div class="form-control col-md-6 mx-2 text-white" style="background: rgba(0, 0, 0, 0.5);">
                                                                    <?=$member->first_name?> <?=$member->last_name?>
                                                                </div>
                                                                <a class="border-0 vertical-center"><i class="booked-icon ion-close-circled border-0 text-white"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="form-group form-group--lg form-nickname">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="terms" required>
                                                    <label class="custom-control-label" for="terms">He leído y acepto los</label> <a href="">Terminos y condiciones</a>
                                                </div>
                                            </div>
                                            <div class="form-submit mt-2">
                                                <input type="submit" id="btnCreate" class="btn btn-lg btn-primary" value="Guardar cambios">
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
    </div>
    <script>
		var BASE_URL = "<?=base_url('api/users')?>"
	</script>
	<script src="<?=base_url('js/teams.js')?>"></script>
</body>