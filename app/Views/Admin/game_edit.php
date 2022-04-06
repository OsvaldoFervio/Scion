
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
                        <h1>Editar Videojuego</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= base_url('admin/videogames/update/'.$videogame->id) ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nombre</label>
                                        <input class="form-control form-control-lg p-2" name="name" id="name" value="<?=$videogame->name?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Plataformas</label>
                                        <select class="form-control" name="platform_id[]" id="platform_id" multiple>
                                            <option selected disabled>Seleccionar</option>
                                            <?php foreach($platforms as $platform) : ?>
                                                <?php if($platform->id) : ?>
                                                <option value="<?= $platform->platform_id?>" selected><?= $platform->name?></option>
                                                <?php else : ?>
                                                <option value="<?= $platform->platform_id?>"><?= $platform->name?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Description</label>
                                        <input class="form-control form-control-lg p-2" name="description" id="description" value="<?=$videogame->description?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Imagen</h3>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label id="images">Selecciona un archivo</label>
                                        <input class="form-control" type="file" name="image" id="image" multiple accept="image/jpeg,image/png,image/jpg">
                                        <input type="submit" class="btn btn-primary mt-4"value="Guardar">
                                    </div>
                                    <div class="col-md-6">
                                        <?php if(! empty($videogame->image_url)) : ?>
                                        <img src="<?=$videogame->image_url?>" alt="<?=$videogame->name?>" class="w-100">
                                        <?php else : ?>
                                        <p>No se ha agregado una imagen</p>
                                        <?php endif; ?>
                                    </div>
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