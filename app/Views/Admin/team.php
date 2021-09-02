<?php define('MEMBER_TYPE_MANAGER', 1) ?>
<?php define('MEMBER_TYPE_PARTICIPANT', 2) ?>
<?php helper('permission') ?>


	<div class="right_col" role="main" style="min-height: 941px;">
        <div class="">
            <?php if(session('success')) : ?>
				<div class="alert alert-success">
					<?= session()->get('success') ?>
				</div>
			<?php endif ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 vertical-center border-0">
                            <?php if(! empty($team->image_url)): ?>
                                <img src="<?=$team->image_url?>" alt="<?=$team->name?>">
                            <?php else: ?>
                                <img src="<?= base_url('images/logo.png') ?>" alt="Escapium">
                            <?php endif?>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between">
                                <h2><?=$team->name?></h2>
                                
                                <div class="d-inline-flex actions">
                                    <a href="<?=base_url('Dashboard/editTeam/'.$team->id)?>" class="btn btn-warning mr-1">Editar</a>
                                    <form action="<?=base_url('Dashboard/deleteTeam/'.$team->id)?>" method="POST">
                                        <input name="_method" value="DELETE" hidden>
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn bg-danger text-white rounded">Eliminar</button>
                                    </form>
                                </div>
                                
                            </div>
                            <a href="<?=$team->discord_url?>" class="h4">Discord</a>
                            <a href="https://wa.me/<?=$team->whatsapp_number?>" class="d-block h4"><i class="booked-icon ion-android-call"></i><span class="mx-2"><?=$team->whatsapp_number?></span></a>
                            <a href="mailto: <?=$team->email?>" class="h3"><i class="booked-icon ion-android-mail"></i><span class="mx-2 h4"><?=$team->email?></span></a>
                            <p class="mt-4 pt-3 text-secondary">Creado el <?=$team->created_at->format('d-m-Y')?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php foreach($members as $index => $member): ?>
                    <?php if($member->type == MEMBER_TYPE_MANAGER): ?>
                        <h4>Manager</h4>
                        <div class="lead">
                            <?=$member->username?>
                        </div>
                        <div class="mt-4">
                            <h4>Participantes</h4>
                        </div>
                    <?php elseif($member->type == MEMBER_TYPE_PARTICIPANT): ?>
                        <div class="lead">
                            <?=$index?>.
                            <?=$member->username?>
                        </div>
                    <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div> 
