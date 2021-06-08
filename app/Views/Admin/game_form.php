
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
                <div class="">
                <?php if(session()->get('success')) : ?>
                        <div class="alert alert-success"><?= session()->get('success')?></div>
                    <?php endif ?>
                    <?php if (session()->get('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->get('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <h1>Registrar Videojuego</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= base_url('admin/videogames/create') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nombre</label>
                                        <input class="form-control form-control-lg p-2" name="name" id="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Plataformas</label>
                                        <select class="form-control" name="platform_id[]" id="platform_id" multiple>
                                            <option selected disabled>Seleccionar</option>
                                            <?php foreach($platforms as $platform) : ?>
                                                <option value="<?= $platform->id?>"><?= $platform->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Description</label>
                                        <input class="form-control form-control-lg p-2" name="description" id="description">
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Imágenes</h3>
                                    <div class="form-group col-md-12">
                                        <label id="images">Selecciona un archivo</label>
                                        <input class="form-control" type="file" name="image" id="image" multiple accept="image/jpeg,image/png,image/jpg">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" class="btn btn-primary" value="Crear">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
</body>