<?php
include 'php/head.php';
?>

<div class="row" style="margin-top: 5em">
    <div class="col-xs-12">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h2>Usuarios</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="tablaUsuarios" class="table table-striped table-responsive table-bordered table-hover">
                        <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EDAD</th>
                        <th>ACCIONES</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h2>Cursos</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="tablaCursos" class="table table-striped table-responsive table-bordered table-hover">
                        <thead>
                        <th>NOMBRE</th>
                        <th>LENGUAJE</th>
                        <th>COSTO</th>
                        <th>ACCIONES</th>
                        </thead>
                        <tbody></tbody>
                    </table>
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

    $('#tablaCursos').on('click', '.eliminarCurso', function (e) {
        e.preventDefault();
        if (confirm('¿Deseas eliminar este curso?')) {
            eliminarCurso($(this).data('id'));
        }
    });

    var eliminarCurso = function (id) {
        var data = {
            accion: 'eliminarCurso',
            id: id
        };
        $.post(apiUrl, data, function (response) {
            console.log(response);
        }, 'json');
    };

    var mostrarUsuarios = function () {
        $.post(apiUrl, {accion: 'mostrarUsuarios'}, function (response) {
            console.log(response);
            if (response.status == "OK") {
                response.datos.forEach(function (item) {
                    $('#tablaUsuarios').append('<tr>' +
                        '<td>' + item.id + '</td>' +
                        '<td>' + item.nombre + ' ' + item.apellido + '</td>' +
                        '<td>' + item.edad + '</td>' +
                        '<td><span class="acciones">' +
                        '<a href="modificar.php?id=' + item.id + '&tipo=Usuario"><i class="fa fa-edit"></i></a>' +
                        '<a href="#"><i class="fa fa-times"></i></a>' +
                        '</span></td>' +
                        '</tr>');
                });
            }
        }, 'json');
    };

    var mostrarCursos = function () {
        $.post(apiUrl, {accion: 'mostrarCursos'}, function (response) {
            console.log(response);
            if (response.status == "OK") {
                response.datos.forEach(function (item) {
                    $('#tablaCursos').append('<tr>' +
                        '<td>' + item.nombre + '</td>' +
                        '<td>' + item.lenguaje + '</td>' +
                        '<td>' + item.costo + '</td>' +
                        '<td><span class="acciones">' +
                        '<a href="modificar.php?id=' + item.id + '&tipo=Curso"><i class="fa fa-edit"></i></a>' +
                        '<a href="#" class="eliminarCurso" data-id="' + item.id + '"><i class="fa fa-times"></i></a>' +
                        '</span></td>' +
                        '</tr>');
                });
            }
        }, 'json');
    };


    mostrarUsuarios();
    mostrarCursos();


</script>


