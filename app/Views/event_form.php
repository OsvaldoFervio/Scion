<?= $this->include('include_files/header') ?>
<?= $this->include('include_files/navbar') ?>
<body>
    <div class="site-wrapper">
        <main class="site-content">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <h1>Registrar evento</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Nombre</label>
                                        <input class="form-control form-control-lg p-2" name="name" id="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="event_type">Tipo</label>
                                        <select class="form-control" name="event_type" id="event_type">
                                            <option selected disabled>Selecciona una:</option>
                                            <option>Internacional</option>
                                            <option>Regional</option>
                                            <option>País</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="country">País</label>
                                        <select class="form-control" name="country_id" id="country">
                                            <option selected disabled>Selecciona uno:</option>
                                            <option>Country 1</option>
                                            <option>Contry 2</option>
                                            <option>Country 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="category">Categoria</label>
                                        <select class="form-control" name="category" id="category">
                                            <option selected disabled>Selecciona una:</option>
                                            <option>Una</option>
                                            <option>Dos</option>
                                            <option>Tres</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="difficulty">Dificultad</label>
                                        <select class="form-control" name="difficulty" id="difficulty">
                                            <option selected disabled>Seleciona una:</option>
                                            <option>Fácil</option>
                                            <option>Normal</option>
                                            <option>Díficil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="videogame">Videojuego</label>
                                        <select class="form-control" name="videogame" id="videogame">
                                            <option selected disabled>Selecciona uno:</option>
                                            <option>Videojuego 1</option>
                                            <option>Videojuego 2</option>
                                            <option>Videojuego 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="platform">Plataforma</label>
                                        <select class="form-control" name="platform" id="platform" multiple>
                                            <option selected disabled>Selecciona una:</option>
                                            <option>Plataforma 1</option>
                                            <option>Plataforma 2</option>
                                            <option>Plataforma 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="date">Fecha</label>
                                        <input type="date" class="form-control" name="date" id="date">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="time">Hora</label>
                                        <input type="time" class="form-control" name="time" id="time">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="timezone">Zona horaria</label>
                                        <select type="text" class="form-control" name="timezone" id="timezone">
                                            <option selected disabled>Selecciona una:</option>
                                            <option>Una</option>
                                            <option>Dos</option>
                                            <option>Tres</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <h4>Participantes</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="max_participants">Num. Máximo</label>
                                        <input type="number" class="form-control" name="max_participants" id="max_participants">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="currency">Num. Mínimo</label>
                                        <input type="number" class="form-control" name="min_participants" id="min_participants">
                                    </div>
                                </div>
                                <div class="row">
                                    <h4>Datos de inscripción</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="price">Precio</label>
                                        <input type="number" class="form-control" name="price" id="price">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="currency">Moneda</label>
                                        <select class="form-control" name="currency" id="currency">
                                            <option selected disabled>Seleciona una:</option>
                                            <option>USD</option>
                                            <option>MXN</option>
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
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="award-name">Nombre</label>
                                            <input type="text" class="form-control" name="award_name[]" id="award-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="award-quantity">Cantidad</label>
                                            <input type="number" class="form-control" name="award_quantity[]" id="award-quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Reglas</h3>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <textarea class="form-control" name="rules"></textarea>
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
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label for="stage-name">Nombre</label>
                                                    <input class="form-control" name="stage_name[]" id="stage-name">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="stage-description">Descripción</label>
                                                    <textarea class="form-control" name="stage_description[]" id="stage-description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Descripción</h3>
                                    <textarea class="form-control" name="description" id="description"></textarea>
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