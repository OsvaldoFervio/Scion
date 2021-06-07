            <div class="right_col" role="main" style="min-height: 941px;">
                <div>
                    <div class="row" style="display: inline-block;">
                        <div class="col-md-12 col-sm-12">
                            <div class="tile_count">
                                <div class="tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Juegos</span>
                                    <div class="count">250</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <div class="col-md-6">
                                        <h3>Juegos<small> Listado</small></h3>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <a href="<?= base_url('admin/videogames/new')?>" class="btn btn-primary">Nuevo</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <p class="text-muted font-13 m-b-30">
                                                    Busqueda y filtrado de información. Los resultados se podrán exportar en el formato seleccionado.
                                                </p>
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nombre</th>
                                                            <th>Activo</th>
                                                            <th>Creado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($videogames as $videogame) : ?>
                                                        <tr>
                                                            <td><?= $videogame->id ?></td>
                                                            <td><?= $videogame->name ?></td>
                                                            <td>
                                                                <?php if($videogame->active == 1) : ?>
                                                                Activo
                                                                <?php else: ?>
                                                                Bloqueado
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?= $videogame->created_at ?></td>
                                                            <td>
                                                                <span class="count_top"><a href="<?= base_url('admin/videogames/show/'.$videogame->id)?>"><i class="fa fa-eye"></i>Ver</a></span>
                                                                <span class="count_top"><a href="<?= base_url('admin/videogames/edit/'.$videogame->id)?>"><i class="fa fa-edit"></i>Editar</a></span>
                                                                <form>
                                                                    <button type="submit"><i class="fa fa-close"></i>Eliminar</a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>