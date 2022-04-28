
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
                <div class="">
                    <div class="row" style="display: inline-block;">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="tile_count">                                
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Pagos</span>
                                    <div class="count"><?= $totals['total'] ?></div>
                                    <span class="count_bottom"><i class="green">1% </i> Última semana</span>
                                </div>                            
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Validados</span>
                                    <div class="count green"><?= $totals['active'] ?></div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>9.2% </i> General</span>
                                </div>
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Por Validar</span>
                                    <div class="count red"><?= $totals['block'] ?></div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i>90.8% </i> General</span>
                                </div>                               
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Ganancia</span>
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
                                        <h3>Pagos<small> Listado</small></h3>
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
                                                <th>Apellidos</th>
                                                <th>Fecha Pago</th>
                                                <th>Usuario</th>
                                                <th>Email</th>                        
                                                <th>Evento</th>
                                                <th>Pago</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach ($users as $item) : ?>

                                              <tr>
                                                <td><?= $item->id ?></td>
                                                <td><?= $item->first_name?></td>
                                                <td><?= $item->last_name?></td>
                                                <td><?= $item->birthdate ?></td>
                                                <td><?= $item->username ?></td>
                                                <td><?= $item->email ?></td>
                                                <td>Evento Random</td>
                                                    <?php if($item->active) :?>                                                    
                                                    <td>Pagado</td>
                                                    <td><span class="count_top"><a href=""><i class="fa fa-money"></i>Pagado</a> </span></td>
                                                    <?php else:  ?>
                                                    <td>Por Validar</td>
                                                    <td><span class="count_top"><a href="<?=base_url('Dashboard/activar/'.$item->id)?>"><i class="fa fa-edit"></i>Validar Pago</a> </span></td>
                                                <?php endif ?>
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
</body>