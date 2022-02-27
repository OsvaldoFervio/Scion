
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
                <div class="">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        Nuevo equipo creado
                    </div>
                    <?php endif ?>
                    <?php if(session('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="m-0">
                        <?php foreach(session()->get('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endif ?>
                    <div class="row" style="display: inline-block;">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="tile_count">                                
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Equipos</span>
                                    <div class="count">250</div>
                                    <span class="count_bottom"><i class="green">1% </i> Última semana</span>
                                </div>                            
                                <div class="col-md-2 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total mujeres</span>
                                    <div class="count green">23</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>9.2% </i> General</span>
                                </div>
                                <div class="col-md-2 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Hombres</span>
                                    <div class="count">227</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i>90.8% </i> General</span>
                                </div>
                                <div class="col-md-2 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Activos</span>
                                    <div class="count">229</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>5% </i> Última semana</span>
                                </div>
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Suscripciones</span>
                                    <div class="count">$15,250</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-money"></i> USD</i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <div class="col-md-6">
                                        <h3>Equipos<small> Listado</small></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
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
                                                <th>Fecha</th>
                                                <th>País</th>
                                                <th>Whatsapp</th>
                                                <th>Activo</th>
                                               
                                                <th>Acciones</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach ($teams as $item) : ?>

                                              <tr>
                                                <td><?= $item->id ?></td>
                                                <td><?= $item->name?></td>
                                                <td><?= $item->created_at?></td>
                                                <td><?= $item->country_id ?></td>
                                                <td><?= $item->whatsapp_number ?></td>
                                                <td><?= $item->active ?></td>
                                                
                                                <td>
                                                    <span class="count_top"><a href="<?=base_url('Dashboard/showTeam/'.$item->id)?>"><i class="fa fa-eye"></i>Ver</a> </span><br>
                                                    <span class="count_top"><a href="<?=base_url('Dashboard/EditTeam/'.$item->id)?>"><i class="fa fa-edit"></i>Editar</a> </span><br>
                                                    <span class="count_top"><a href="<?=base_url('Dashboard/equipo/'.$item->id)?>"><i class="fa fa-close"></i>Eliminar</a> </span><br></td>
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
            <!-- /page content -->
        </div>
    </div>
    <?php if(session('success') or session('errors')): ?>
    <script>
        setTimeout(function() {
            document.getElementsByClassName('alert')[0].remove();
        }, 2000);
    </script>
    <?php endif ?>
</body>