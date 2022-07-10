            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
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
                        <div class="col-lg-12 mb-5">
                            <h2>NUEVO EQUIPO <p class="d-inline font-weight-bold"><?= $team->name ?></p></h2>
                            <hr class="divider-sm">
                        </div>
                        <form method="post" enctype="application/json" action="<?=base_url('admin/teams/'.$id.'/participants')?>">
                        <?= csrf_field() ?>
                            <div class="col-lg-12 ml-lg-auto mr-lg-auto">
                                <h2><i class="booked-icon ion-person"></i> &nbsp; AGREGAR PARTICIPANTES</h2>
                                <hr class="divider-sm">
                                <div class="row">
                                    <div class="col-lg-8 offset-md-1">
                                        <div id="" class="tab-pane booked-tab-content  bookedClearFix" role="tabpanel" aria-labelledby="profile-edit-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <input class="form-control col-md-5" type="text" id="username-p" placeholder="Username..." data-username-type="participant">
                                                        <input class="form-control col-md-4" type="text" id="gameUserId-p" placeholder="Id User game...">
                                                        <button type="button" class="btn btn-info col-md-2" id="btn-add">Agregar</button>
                                                        <span class="vertical-center border-0">Agrega 4 mínimo y 6 máximo de participantes</span>
                                                        <p class="text-info font-weight-bold d-none" id="alert-not-available">*Usuario no disponible para equipo</p>
                                                    </div>
                                                    <div class="px-4 py-1 rounded-sm overflow-auto d-none" style="height: 100px; background: rgba(0, 0, 0, 0.5);" id="users-list-p"></div>
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
            <!-- /page content -->
        </div>
    </div>
    <script src="<?= base_url('js/custom.js')?>"></script>
    <script>
        var BASE_URL = "<?=base_url('api/users')?>"
    </script>
    <script src="<?=base_url('js/teams-admin.js')?>"></script>
</body>