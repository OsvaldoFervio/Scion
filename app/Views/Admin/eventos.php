
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 941px;">
                <div class="">
                    <div class="row" style="display: flex;">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="tile_count">                                
                                <div class="col-md-3 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Eventos</span>
                                    <div class="count"><?= $totals['total'] ?></div>
                                    <span class="count_bottom"><i class="green">100% </i></span>
                                </div>                            
                                <div class="col-md-2 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Eventos Activos</span>
                                    <div class="count green"><?= $totals['active'] ?></div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?= bcdiv($totals['active'], $totals['total'], 4)*100 ?>% </i></span>
                                </div>
                                <div class="col-md-2 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Eventos Inactivos</span>
                                    <div class="count"><?= $totals['block'] ?></div>
                                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i><?= bcdiv($totals['block'], $totals['total'], 4)*100 ?>% </i> </span>
                                </div>
                                <div class="col-md-2 col-sm-4  tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Eventos Expirados</span>
                                    <div class="count"><?= $totals['expired'] ?></div>
                                    <span class="count_bottom"><i class="blue"><i class="fa fa-sort-asc"></i><?= bcdiv($totals['expired'], $totals['total'], 4)*100 ?>% </i> Última semana</span>
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
                                        <h3>Eventos<small> Listado</small></h3>
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
                                                <th>Precio</th>
                                                <th>Min-Max Part.</th>                        
                                                <th>Activo</th>
                                                <th>Equipos</th>
                                                <th>Participantes</th>
                                                <th>Total</th>
                                                <th>Acciones</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach ($events as $item) : ?>

                                              <tr>
                                                <td><?= $item->id ?></td>
                                                <td><?= $item->name?></td>
                                                <td><?= $item->date?></td>
                                                <td><?= $item->price ?></td>
                                                <td><?= $item->min_participants.'-'.$item->max_participants  ?></td>
                                                <td><?= $item->active ?></td>
                                                <td>25</td>
                                                <td>216</td>
                                                <td>$5,400</td>
                                                <td>
                                                    <span class="count_top"><a href="<?=base_url('Dashboard/evento/'.$item->id)?>"><i class="fa fa-eye"></i>Ver</a> </span><br>
                                                    <span class="count_top"><a href="<?=base_url('Dashboard/EditEvent/'.$item->id)?>"><i class="fa fa-edit"></i>Editar</a> </span><br>
                                                    <span class="count_top"><a href="<?=base_url('Dashboard/evento/'.$item->id)?>"><i class="fa fa-close"></i>Eliminar</a> </span><br></td>
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