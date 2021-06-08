
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
                <div class="">
                    <div class="row">
                        <div class="col-md-8">
                            <h1><?=$videogame->name?></h1>
                        </div>
                        <div class="col-md-4 text-right mt-3">
                            <div class="btn-group">
                                <a class="btn btn-primary mr-2" href="<?=base_url('admin/videogames/edit/'.$videogame->id)?>">Editar</a>
                                <form action="<?=base_url('admin/videogames/delete/'.$videogame->id)?>" method="POST" class="mr-4">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?= csrf_field() ?>
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                            </div>
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
                                        <?php if($platform->id): ?>
                                        <li class="list-group-item"><?= $platform->name?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <h3>Imagen</h3>
                                <div class="col-md-12">
                                    <img src="<?=$videogame->image_url?>" alt="<?=$videogame->name?>" class="w-50">
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