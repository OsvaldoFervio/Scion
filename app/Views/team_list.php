<body>
    <div class="site-wrapper">
        <main class="site-content">
            <div class="section-content p-5">
                <div class="container">
                    <div class="row">
                        <h2>Tus equipos</h2>
                        <a href="<?=base_url('teams/new')?>" class="btn btn-primary btn-sm mx-4">
                            <i class="booked-icon ion-plus m-auto"></i>
                        </a>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-10">
                            <?php if(count($teams) == 0): ?>
                                <p class="h4 text-secondary">No tienes equipos</p>
                            <?php endif ?>
                            <?php foreach($teams as $team): ?>
                                <div class="row">
                                    <div class="col-md-3">
                                    <?php if(! empty($team->image_url)): ?>
                                        <img src="<?=$team->image_url?>" alt="<?=$team->name?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('images/logo.png') ?>" alt="Escapium">
                                    <?php endif?>
                                        <hr class="divider">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?=base_url('teams/'.$team->id)?>" class="h3"><?=$team->name?></a>
                                    </div>
                                    <div class="col-md-3">
                                        <!--<div class="btn-group" role="group">
                                            <a class="btn btn-warning">Editar</a>
                                            <div>
                                                <form action="" method="post">
                                                    <button class="btn bg-danger text-white rounded-top rounded-bottom rounded-left h1" type="submit">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>