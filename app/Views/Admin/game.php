
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
                <div class="">
                    <div class="row">
                        <div class="col-md-8">
                            <h1><?=$videogame->name?></h1>
                        </div>
                        <div class="col-md-4 text-right mt-3">
                            <a class="btn btn-primary mr-4" href="#">Editar</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead"><?= $videogame->description?></p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Plataformas</h4>
                                    <ul class="list-group mr-4">
                                    <?php foreach($platforms as $platform) : ?>
                                        <li class="list-group-item"><?= $platform->name?></li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <h3>Imágenes</h3>
                                <div class="form-group col-md-12">
                                    <label id="images">Selecciona un archivo</label>
                                    <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/jpeg,image/png,image/jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
</body>