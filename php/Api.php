<?php
require 'ApiClass.php';
try {
    $api = new ApiClass();

    $accion = $_POST['accion'];

    switch ($accion) {
        case "mostrarUsuarios":
            echo json_encode(array('status' => 'OK', 'datos' => $api->mostrarUsuarios()));
            break;
        case "mostrarCursos":
            echo json_encode(array('status' => 'OK', 'datos' => $api->mostrarCursos()));
            break;
        case "registrarUsuario":
            $insert = $api->registrarUsuario($_POST);
            if ($insert) {
                echo json_encode(array('status' => 'OK', 'mensaje' => 'Registro exitoso'));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'Registro fallido'));
            }
            break;
        case "registrarCurso":
            $insert = $api->registrarCurso($_POST);
            if ($insert) {
                echo json_encode(array('status' => 'OK', 'mensaje' => 'Registro exitoso'));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'Registro fallido'));
            }
            break;
        case "obtenerCurso":
            $curso = $api->obtenerCursoPorId($_POST['id']);
            if ($curso != NULL) {
                echo json_encode(array('status' => 'OK', 'curso' => $curso));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'No se obtuvo el curso'));
            }
            break;
        case "obtenerUsuario":
            $usuario = $api->obtenerUsuarioPorId($_POST['id']);
            if ($usuario != NULL) {
                echo json_encode(array('status' => 'OK', 'usuario' => $usuario));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'No se obtuvo el usuario'));
            }
            break;
        case "actualizarCurso":
            $id = $_POST['id'];
            unset($_POST['id'], $_POST['accion']);
            $update = $api->actualizarCursoPorId($_POST, $id);
            //var_dump($update);
            if ($update) {
                echo json_encode(array('status' => 'OK', 'mensaje' => 'Actualización exitosa'));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'Actualización fallida'));
            }
            break;
        case "actualizarUsuario":
            $id = $_POST['id'];
            unset($_POST['id'], $_POST['accion']);
            $update = $api->actualizarUsuarioPorId($_POST, $id);
            if ($update) {
                echo json_encode(array('status' => 'OK', 'mensaje' => 'Actualización exitosa'));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'Actualización fallida'));
            }
            break;
        case "eliminarCurso":
            $id = $_POST['id'];
            $delete = $api->eliminarCursoPorId($id);
            if ($delete) {
                echo json_encode(array('status' => 'OK', 'mensaje' => 'Eliminación exitosa'));
            } else {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'Eliminación fallida'));
            }
            break;
        case "obtenerDatosParaInscripcion":
            $usuarios = $api->mostrarUsuarios();
            $cursos = $api->mostrarCursos();
            echo json_encode(array('status' => 'OK', 'usuarios' => $usuarios, 'cursos' => $cursos));
            break;
        case "inscribirUsuarioACurso":
            if ($api->estaInscrito($_POST['id_usuario'], $_POST['id_curso'])) {
                echo json_encode(array('status' => 'ERROR', 'mensaje' => 'El usuario ya está inscrito'));
            } else {
                if($api->inscribir($_POST['id_usuario'], $_POST['id_curso'])){
                    echo json_encode(array('status' => 'OK', 'mensaje' => 'Inscripción exitosa'));
                } else {
                    echo json_encode(array('status' => 'ERROR', 'mensaje' => 'Ocurrio un problema al inscribir'));
                }
            }
            break;
        default:
            echo "No se recibio paramétro de busqueda.";
            break;
    }

} catch (Exception $e) {
    die($e->getMessage());
}