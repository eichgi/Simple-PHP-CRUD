<?php
include 'php/head.php';
?>

<div class="row" style="margin-top: 5em">
    <div class="col-xs-12">
        <div class="col-sm-10 col-sm-offset-1">
            <div id="panel-curso" class="panel panel-default" style="display: none;">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h2>Modificar Curso</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="actualizarCurso" style="margin-bottom: 1em">
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
                        <input type="hidden" name="accion" value="actualizarCurso">
                        <button type="submit" class="btn btn-default btn-success">Actualizar curso</button>
                    </form>
                    <div id="alertaCurso" class="alert" role="alert"></div>
                </div>
            </div>

            <div id="panel-usuario" class="panel panel-default" style="display: none;">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h2>Modificar Usuario</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="actualizarUsuario" style="margin-bottom: 1em">
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
                        <input type="hidden" name="accion" value="actualizarUsuario">
                        <button type="submit" class="btn btn-default btn-success">Actualizar usuario</button>
                    </form>
                    <div id="alertaUsuario" class="alert" role="alert"></div>
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
    var buscar = window.location.search.split('&');
    var id = buscar[0].substr(1).split('=')[1];
    var tipo = buscar[1].split('=')[1];
    var data = {
        accion: 'obtener' + tipo,
        id: id
    };
    
    var ajaxCurso = function () {
        $.post(apiUrl, data, function (response) {
            console.log(response);
            $('#actualizarCurso input[name=nombre]').val(response.curso.nombre);
            $('#actualizarCurso input[name=lenguaje]').val(response.curso.lenguaje);
            $('#actualizarCurso input[name=costo]').val(response.curso.costo);
        }, 'json');
        $('#panel-curso').show();
    };

    var ajaxUsuario = function () {
        $.post(apiUrl, data, function (response) {
            console.log(response);
            $('#actualizarUsuario input[name=nombre]').val(response.usuario.nombre);
            $('#actualizarUsuario input[name=apellido]').val(response.usuario.apellido);
            $('#actualizarUsuario input[name=edad]').val(response.usuario.edad);
        }, 'json');
        $('#panel-usuario').show();
    };

    if (data.accion == 'obtenerCurso') {
        ajaxCurso();
    } else if (data.accion == 'obtenerUsuario') {
        ajaxUsuario();
    } else {
        alert('Petición incorrecta');
    }

    $('#actualizarCurso').on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);
        form.append('id', id);
        $.ajax({
            url: apiUrl,
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 'OK') {
                    $('#alertaCurso').addClass('alert-success').html('<p>Actualizacion exitosa</p>').show('400');
                } else {
                    $('#alertaCurso').addClass('alert-danger').html('<p>Ocurrio un problema</p>').show('400');
                }
                setTimeout(function () {
                    $('#alertaCurso').hide('400');
                    window.location.href = 'index.php';
                }, 3000);
            }
        });
    });

    $('#actualizarUsuario').on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);
        form.append('id', id);
        $.ajax({
            url: apiUrl,
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 'OK') {
                    $('#alertaUsuario').addClass('alert-success').html('<p>Actualizacion exitosa</p>').show('400');
                } else {
                    $('#alertaUsuario').addClass('alert-danger').html('<p>Ocurrio un problema</p>').show('400');
                }
                setTimeout(function () {
                    $('#alertaUsuario').hide('400');
                    window.location.href = 'index.php';
                }, 3000);
            }
        });
    });

</script>
