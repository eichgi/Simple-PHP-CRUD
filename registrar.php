<?php
include 'php/head.php';
?>

<div class="row" style="margin-top: 5em">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h2>Registrar Usuario</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="nuevoUsuario" style="margin-bottom: 1em">
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="form-group">
                            <label>Apellido: </label>
                            <input type="text" class="form-control" name="apellido">
                        </div>
                        <div class="form-group">
                            <label>Edad: </label>
                            <input type="number" class="form-control" name="edad">
                        </div>
                        <input type="hidden" name="accion" value="registrarUsuario">
                        <button type="submit" class="btn btn-default btn-success">Registrar usuario</button>
                    </form>
                    <div id="alertaUsuario" class="alert" role="alert" style="display: none"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h2>Registrar Curso</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="nuevoCurso" style="margin-bottom: 1em">
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="form-group">
                            <label>Lenguaje: </label>
                            <input type="text" class="form-control" name="lenguaje">
                        </div>
                        <div class="form-group">
                            <label>Costo: </label>
                            <input type="number" step="any" class="form-control" name="costo">
                        </div>
                        <input type="hidden" name="accion" value="registrarCurso">
                        <button type="submit" class="btn btn-default btn-success">Registrar curso</button>
                    </form>
                    <div id="alertaCurso" class="alert" role="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'php/footer.php';
?>

<script>
    var apiUrl = 'php/Api.php';

    $('#nuevoUsuario').on('submit', function (e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: apiUrl,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 'OK') {
                    $('#alertaUsuario').addClass('alert-success').html('<p>Registro exitoso</p>').show('400');
                } else {
                    $('#alertaUsuario').addClass('alert-danger').html('<p>Ocurrio un problema</p>').show('400');
                }
                setTimeout(function () {
                    $('#alertaUsuario').hide('400');
                    limpiarCampos(form);
                }, 3000);
            }
        });
    });

    $('#nuevoCurso').on('submit', function (e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: apiUrl,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 'OK') {
                    $('#alertaCurso').addClass('alert-success').html('<p>Registro exitoso</p>').show('400');
                } else {
                    $('#alertaCurso').addClass('alert-danger').html('<p>Ocurrio un problema</p>').show('400');
                }
                setTimeout(function () {
                    $('#alertaCurso').hide('400');
                    limpiarCampos(form);
                }, 3000);
            }
        });
    });

    var limpiarCampos = function (elem) {
        $('#' + elem.id + ' input').val('');
    };
</script>
