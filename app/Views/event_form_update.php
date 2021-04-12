<?= $this->include('include_files/header') ?>
<?= $this->include('include_files/navbar') ?>
<body>
    <div class="site-wrapper">
        <main class="site-content">
            <div class="section-content">
                <div class="container">
                    <?php if(session()->get('success')) : ?>
                        <div class="alert alert-success">Evento actualizado</div>
                    <?php endif ?>
                    <div class="row">
                        <h1>Actualizar evento</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= base_url('events/update/'.$event->id) ?>" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="user_id" value="<?=$event->user_id ?>">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Nombre</label>
                                        <input class="form-control form-control-lg p-2" name="name" id="name" value="<?= $event->name ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="event_type">Tipo</label>
                                        <select class="form-control" name="event_type" id="event_type">
                                            <option selected disabled>Selecciona una:</option>
                                            <?php foreach ($eventTypes as $eventType): ?>
                                                <?php if ($eventType->id == $event->type_id) : ?>
                                                <option value="<?=$eventType->id ?>" selected>
                                                    <?= $eventType->name ?>
                                                </option>
                                                <?php else : ?>
                                                <option value="<?=$eventType->id ?>">
                                                    <?= $eventType->name ?>
                                                </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="country">País</label>
                                        <select class="form-control" name="country_id" id="country">
                                            <option selected disabled>Selecciona uno:</option>
                                            <?php foreach ($countries as $country): ?>
                                            <option value="<?= $country->id ?>">
                                                <?= $country->name ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="category">Categoria</label>
                                        <select class="form-control" name="category" id="category">
                                            <option selected disabled>Selecciona una:</option>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category->id == $event->category_id) : ?>
                                                <option value="<?= $category->id ?>" selected>
                                                    <?= $category->name ?>
                                                </option>
                                                <?php else : ?>
                                                <option value="<?= $category->id ?>">
                                                    <?= $category->name ?>
                                                </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="difficulty">Dificultad</label>
                                        <select class="form-control" name="difficulty" id="difficulty">
                                            <option selected disabled>Seleciona una:</option>
                                            <?php foreach ($difficulties as $difficulty): ?>
                                                <?php if ($difficulty->id == $event->difficulty_id) : ?>
                                                <option value="<?= $difficulty->id ?>" selected>
                                                    <?= $difficulty->name ?>
                                                </option>
                                                <?php else : ?>
                                                <option value="<?= $difficulty->id ?>">
                                                    <?= $difficulty->name ?>
                                                </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="videogame">Videojuego</label>
                                        <select class="form-control" name="videogame" id="videogame">
                                            <option selected disabled>Selecciona uno:</option>
                                            <?php foreach ($videogames as $videogame): ?>
                                                <?php if ($videogame->id == $event->videogame_id) : ?>
                                                <option value="<?= $videogame->id ?>" selected>
                                                    <?= $videogame->name ?>
                                                </option>
                                                <?php else : ?>
                                                <option value="<?= $videogame->id ?>">
                                                    <?= $videogame->name ?>
                                                </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="platform">Plataforma</label>
                                        <select class="form-control" name="platform[]" id="platform" multiple>
                                            <option selected disabled>Selecciona una:</option>
                                            <?php foreach ($platforms as $platform): ?>
                                                <?php if ($platform->id) : ?>
                                                <option value="<?= $platform->platform_id ?>" selected>
                                                    <?= $platform->name ?>
                                                </option>
                                                <?php else : ?>
                                                <option value="<?= $platform->platform_id ?>">
                                                    <?= $platform->name ?>
                                                </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="date">Fecha</label>
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $event->date ?>">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="time">Hora</label>
                                        <input type="time" class="form-control" name="time" id="time" value="<?= $event->time ?>">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="timezone">Zona horaria</label>
                                        <select type="text" class="form-control" name="timezone" id="timezone">
                                            <option selected disabled>Selecciona una:</option>
                                            <?php foreach ($timezones as $timezone): ?>
                                                <?php if ($timezone->id == $event->timezone_id) : ?>
                                                    <option value="<?= $timezone->id ?>" selected>
                                                        <?= $timezone->name ?>
                                                    </option>
                                                <?php else : ?>
                                                    <option value="<?= $timezone->id ?>">
                                                        <?= $timezone->name ?>
                                                    </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <h4>Participantes</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="currency">Num. Mínimo</label>
                                        <input type="number" class="form-control" name="min_participants" id="min_participants" value="<?= $event->min_participants ?>">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="max_participants">Num. Máximo</label>
                                        <input type="number" class="form-control" name="max_participants" id="max_participants" value="<?= $event->max_participants ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <h4>Datos de inscripción</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="price">Precio</label>
                                        <input type="number" class="form-control" name="price" id="price" value="<?= $event->price ?>">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="currency">Moneda</label>
                                        <select class="form-control" name="currency" id="currency">
                                            <option selected disabled>Seleciona una:</option>
                                            <?php foreach ($currencies as $currency) : ?>
                                                <?php if ($currency->id == $event->currency_id) : ?>
                                                    <option value="<?= $currency->id?>" selected>
                                                        <?= $currency->name ?>
                                                    </option>
                                                <?php else : ?>
                                                    <option value="<?= $currency->id?>">
                                                        <?= $currency->name ?>
                                                    </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex">
                                        <h4>Premios</h4>
                                        <div class="ml-4 col-4">
                                            <button type="button" class="btn btn-info btn-sm" id="btn-add-award">
                                                <i class="icon-plus"></i>
                                                Nuevo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php foreach ($eventAwards as $award) : ?>
                                        <div class="col-6">
                                            <input type="hidden" name="award_id[]" value="<?= $award->id ?>">
                                            <div class="form-group">
                                                <label for="award-name">Nombre</label>
                                                <input type="text" class="form-control" name="award_name[]" id="award-name" value="<?= $award->name ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="award-quantity">Cantidad</label>
                                                <input type="text" class="form-control" name="award_quantity[]" id="award-quantity" value="<?= $award->amount ?>">
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="row">
                                    <h3>Reglas</h3>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <textarea class="form-control" name="rules"><?= $eventDetails->rules ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="d-flex">
                                                <h4>Estructura</h4>
                                                <div class="ml-4">
                                                    <button type="button" id="btn-add-stage" class="btn btn-info btn-sm">
                                                        <i class="icon-plus"></i>
                                                        Nuevo
                                                    </button>
                                                </div>
                                            </div>
                                            <?php foreach ($eventStages as $stage) : ?>
                                                <div class="col-md-12">
                                                    <input type="hidden" name="stage_id[]" value="<?= $stage->id ?>">
                                                    <div class="form-group col-md-12">
                                                        <label for="stage-name">Nombre</label>
                                                        <input class="form-control" name="stage_name[]" id="stage-name" value="<?= $stage->name ?>">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="stage-description">Descripción</label>
                                                        <textarea class="form-control" name="stage_description[]" id="stage-description"><?= $stage->description ?></textarea>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Descripción</h3>
                                    <textarea class="form-control" name="description" id="description"><?= $eventDetails->description ?></textarea>
                                </div>
                                <div class="row">
                                    <h3>Imágenes</h3>
                                    <div class="form-group col-md-12">
                                        <label id="images">Selecciona hasta 3 archivos:</label>
                                        <input class="form-control" type="file" name="images" id="images" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" class="btn btn-primary" value="Crear">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
