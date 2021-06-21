<?= $this->include('include_files/header') ?>
<?= $this->include('include_files/navbar') ?>
<body>
	<div class="site-wrapper">
		<!-- Content -->
		<main class="site-content">
			<div class="section-content p-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 vertical-center border-0">
                                    <?php if(! empty($team->image_url)): ?>
                                        <img src="<?=$team->image_url?>" alt="<?=$team->name?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('images/logo.png') ?>" alt="Escapium">
                                    <?php endif?>
                                </div>
                                <div class="col-md-8">
                                    <h2><?=$team->name?></h2>
                                    <a href="<?=$team->discord_url?>" class="h4">Discord</a>
                                    <a href="https://wa.me/<?=$team->whatsapp_number?>" class="d-block h4"><i class="booked-icon ion-android-call"></i><span class="mx-2"><?=$team->whatsapp_number?></span></a>
                                    <a href="mailto: <?=$team->email?>" class="h3"><i class="booked-icon ion-android-mail"></i><span class="mx-2 h4"><?=$team->email?></span></a>
                                    <p class="mt-4 pt-3 text-secondary">Creado el <?=$team->created_at->format('d-m-Y')?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-center">Equipo</h4>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>