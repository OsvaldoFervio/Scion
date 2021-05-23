<?php helper('admin'); ?>
 <div class="right_col" role="main" style="min-height: 941px;">
    <div class="">        
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="col-md-6">
                            <h3><small>Evento: </small><?= $event->name ?> </h3>
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
                    <div class="col-md-12">
                         <?php if (is_admin()) : ?>
                        <div class="row">
                            <div class="w-100 d-flex justify-content-end">
                                <a href="<?= base_url('Dashboard/EditEvent/' . $event->id) ?>" class="btn btn-primary">Editar</a>
                                <div class="mx-2">
                                    <form action="<?= base_url('admin/events/delete/' . $event->id) ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn bg-danger text-white rounded-0">ELIMINAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                        <div class="col-md-12">
                            <div class="thumbnail">
                              <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="<?=base_url('images/gaming.jpg') ?>" alt="image" />
                                <div class="mask">
                                  <p>Your Text</p>
                                  <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="caption">
                                <p>Snow and Ice Incoming for the South</p>
                              </div>
                            </div>
                        </div>
                    </div>
                    <section class="content invoice">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="room__meta-item-value">
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="room__meta-item-value">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-3 invoice-col">
                                <i class="icon-tag"></i> Categoría:
                                <address>
                                    <?= $event->category_name ?>
                                    <div><strong>Dificultad:</strong><?= $event->difficulty_name ?></div>                                        
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <i class="icon-calendar">Fecha: </i> 
                                <address>
                                    <?= $event->date_formatted ?>     
                                    <div><i class="ion-person-stalker"></i> <?= $event->max_participants ?>Participantes</div>
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <i class="icon-calendar">Horario: </i> 
                                <address>
                                    <?= $event->timezone_offset ?>                                    
                                    <div><i class="ion-person-stalker"></i> <?= $event->timezone_name ?> </div>
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <i class="icon-calendar">Premios: </i> 
                                <address>
                                    
                                    <?php if ($eventAwards) : ?>
                                        <?php foreach ($eventAwards as $award) : ?>
                                            <div class="room-details__item">
                                                <i class="fas fa-trophy"></i>
                                                <?= $award->name ?> <?= $award->amount ?>
                                            </div>
                                        <?php endforeach ?>
                                        <?php else : ?>
                                        <div class="room-details__item">
                                            NO HAY PREMIOS
                                        </div>
                                    <?php endif ?>                                    
                                </address>
                            </div>
                    </section>
                    <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reglas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Estructura</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php if ($eventDetails) :  ?>
                            <p><?= $eventDetails->description ?></p>
                            <?php else : ?>
                                <p>No hay una descripción</p>
                            <?php endif ?>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?php if ($eventDetails and $eventDetails->rules) :  ?>
                            <p><?= $eventDetails->rules ?></p>
                            <?php else : ?>
                                <p>No se definieron reglas</p>
                            <?php endif ?>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <?php if ($eventStages) : ?>
                            <?php foreach ($eventStages as $index => $stage) : ?>
                                <div class="size-content p-2">
                                    <div class="title"><?= $index + 1 ?>. <?= $stage->name ?></div>
                                    <div class="item"><?= $stage->description ?></div>
                                </div>
                            <?php endforeach ?>
                            <?php else : ?>
                                <div>Por definir</div>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- page content -->
    <div class="right_col" role="main" style="min-height: 941px;">
        <div class="site-wrapper">
        

        <!-- Content -->
        <main class="site-content">
            <div class="section-content">
                <div class="container">
                   
                    <!-- Single Room - Content -->
                    <div class="single-room-content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="room__meta-item-value">
                                    <i class="icon-tag"></i> Categoría: <?= $event->category_name ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="room__meta-item-value">
                                    <i class="icon-calendar"></i> <?= $event->date_formatted ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Meta -->
                                <div class="room__meta room__meta--lg">
                                    <div class="room__meta-item room__meta-item--rating">
                                        <div class="room__meta-item-value">
                                            <!-- Rating -->
                                            <div class="room__complexity rating-icons">
                                                <div class="rating-icons__placeholder">
                                                    <i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
                                                </div>

                                                <div class="rating-icons__active">
                                                    <i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i><i class="ion-locked"></i>
                                                </div>
                                            </div>
                                            <!-- Rating / End -->

                                        </div>
                                        <div class="room__meta-item-label"><?= $event->difficulty_name ?></div>
                                    </div>

                                    <div class="room__meta-item">
                                        <div class="room__meta-item-value">
                                            
                                        </div>
                                        <div class="room__meta-item-label">Participantes</div>
                                    </div>

                                    <div class="room__meta-item">
                                        <div class="room__meta-item-value">
                                            <i class="icon-clock"></i> 
                                        </div>
                                        <div class="room__meta-item-label"></div>
                                    </div>
                                </div>
                                <!-- Meta / End -->

                               

                            </div>

                            
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Meta -->
                                <div class="room__meta room__meta--lg">
                                    <div class="room__meta-item room__meta-item--rating">
                                        <div class="room__meta-item-label">
                                            <h3>Reglas</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Meta / End -->

                               
                            </div>

                            <div class="col-md-4">
                                <!-- Room Details -->
                                <div class="room__meta-item-label">
                                    <h3>Estructura</h3>
                                </div>

                               
                                <!-- Room Details / End -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Room - Content / End -->
                </div>
            </div>

            <!-- Related Rooms -->
            <div class="section-content">
                <div class="container">
                    <h2>Otros Eventos</h2>
                    <!-- Rooms Grid - 3 cols -->
                    <div class="row rooms rooms--grid js-rooms-related slick--arrows-top">

                        <?php foreach ($events as $e) : ?>
                            <div class="room col-sm-3 col-md-3 room--category-<?= strtolower($e->difficulty_name) ?>">
                                <div class="room__inner">
                                    <div class="room__body">
                                        <!-- Rating -->
                                        <div class="room__complexity rating-icons">
                                            <!--<div class="rating-icons__placeholder">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div>

                                        <div class="rating-icons__active">
                                            <i class="ion-star"></i><i class="ion-star"></i><i class="ion-star"></i>
                                        </div> -->
                                        </div>
                                        <!-- Rating / End -->

                                        <!-- Title -->
                                        <h3 class="room__title"><a href="<?= base_url('events/' . $e->id) ?>"><?= $e->name ?></a><span> $25 USD</span></h3>
                                        <!-- Title / End -->

                                        <!-- Meta -->
                                        <div class="room__meta">
                                            <div class="room__meta-item">
                                                <i class="ion-calendar"></i><?= $e->date ?>
                                            </div>

                                            <div class="room__meta-item">
                                                <i class="ion-person-stalker"></i> <?= $e->min_participants ?>-<?= $e->max_participants ?>
                                            </div>
                                            <?php if ($e->type_id == 3) : ?>
                                                <div class="room__meta-item">
                                                    <i class="ion-location"></i> <?= $e->country_name ?>
                                                </div>
                                            <?php else : ?>
                                                <div class="room__meta-item">
                                                    <i class="ion-location"></i> <?= $e->type_name ?>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- Meta / End -->
                                    </div>
                                    <!-- Image -->

                                    <figure class="room__img">
                                        <?php if ($e->image_url) : ?>
                                            <a href="<?= base_url('events/' . $e->id) ?>"><img src="<?= $e->image_url ?>" alt=""></a>
                                        <?php else : ?>
                                            <a href="<?= base_url('events/' . $e->id) ?>"><img src="<?= base_url('/images/event.png') ?>" alt=""></a>
                                        <?php endif ?>
                                    </figure>
                                    <!-- Image / End -->
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                    <!-- Rooms Grid-3 cols / End  -->
                </div>
            </div>
            <!-- Related Rooms / End -->
        </main>

        <!-- Search Form -->
        <i class="js-search-form-close search-form-close icon-close"></i>
        <form action="#" class="search-form-overlay">
            <div class="search-input">
                <input type="text" name="input-search" class="input-search" placeholder="Enter your search...">
                <button type="submit" class="submit">
                    <i class="icon-arrow-right"></i>
                </button>
            </div>
        </form>     
        <!-- Search Form / End -->
    </div><!-- .site-wrapper -->
            </div>
            <!-- /page content -->
        </div>
    </div>
</body>