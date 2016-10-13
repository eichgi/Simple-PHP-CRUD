<?php
include 'php/head.php';
?>

<div class="row" style="margin-top: 5em">
    <div class="col-sm-10 col-sm-offset-1">


        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>Inscribir usuario</h2>
                </div>
            </div>
            <div class="panel-body">
                <form id="inscripcion" style="margin-bottom: 1em">
                    <div class="form-group">
                        <label>Usuario: </label>
                        <select name="id_usuario" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Curso: </label>
                        <select name="id_curso" class="form-control"></select>
                    </div>
                    <input type="hidden" name="accion" value="inscribirUsuarioACurso">
                    <button type="submit" class="btn btn-default btn-success">Inscribir usuario</button>
                </form>
                <div id="alertaUsuario" class="alert" role="alert" style="display: none;"></div>
            </div>
        </div>


    </div>
</div>

<?php
include 'php/footer.php';
?>

<script>
    var apiUrl = 'php/Api.php';

    var cargarDatos = function () {
        var data = {
            accion: 'obtenerDatosParaInscripcion',
        };
        $.post(apiUrl, data, function (response) {
            if (response.status == "OK") {
                var usuarios = response.usuarios;
                usuarios.forEach(function (item) {
                    $(':input[name=id_usuario]').append('<option value="' + item.id + '">' + item.nombre + ' ' + item.apellido + '</option>');
                });
                var cursos = response.cursos;
                cursos.forEach(function (item) {
                    $(':input[name=id_curso]').append('<option value="' + item.id + '">' + item.nombre + ' - ' + item.lenguaje + '</option>');
                });
            }
        }, 'json');
    };


    $('#inscripcion').on('submit', function (e) {
        e.preventDefault();
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
                    $('#alertaUsuario').addClass('alert-success').html('<p>' + response.mensaje + '</p>').show('400');
                } else {
                    $('#alertaUsuario').addClass('alert-danger').html('<p>' + response.mensaje + '</p>').show('400');
                }
                setTimeout(function () {
                    $('#alertaUsuario').hide('400');
                }, 3000);
            }
        });
    });

    var limpiarCampos = function (elem) {
        $('#' + elem.id + ' input').val('');
    };

    cargarDatos();
</script>
