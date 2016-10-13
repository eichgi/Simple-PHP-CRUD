<?php
require('FluentPDO/FluentPDO.php');

class ApiClass
{

    var $fluent;

    public function __construct()
    {
        try {

            $pdo = new PDO("mysql:host=localhost;dbname=crud", "root", "4lt4m1r4*");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec("set charset utf8");

            $this->fluent = new FluentPDO($pdo);

        } catch (PDOException $e) {
            echo "Error al conectar la base de datos" . $e->getMessage();

        }
    }

    public function mostrarUsuarios()
    {
        $query = $this->fluent->from('usuarios');
        return $query->fetchAll();
    }

    public function mostrarCursos()
    {
        $query = $this->fluent->from('cursos');
        return $query->fetchAll();
    }

    public function registrarUsuario($array)
    {
        unset($array['accion']);
        $query = $this->fluent->insertInto('usuarios')->values($array);
        $insert = $query->execute();
        return $insert;
    }

    public function registrarCurso($array)
    {
        unset($array['accion']);
        $query = $this->fluent->insertInto('cursos')->values($array);
        $insert = $query->execute();
        return $insert;
    }

    public function obtenerCursoPorId($id)
    {
        $query = $this->fluent->from('cursos')->where('id', $id);
        return $query->fetch();
    }

    public function obtenerUsuarioPorId($id)
    {
        $query = $this->fluent->from('usuarios')->where('id', $id);
        return $query->fetch();
    }

    public function actualizarCursoPorId($datos, $id)
    {
        //$update = $this->fluent->update('cursos')->set($datos)->where('id', $id);
        $update = $this->fluent->update('cursos', $datos, $id);
        $update->execute();
        return $update;
    }

    public function actualizarUsuarioPorId($datos, $id)
    {
        $update = $this->fluent->update('usuarios', $datos, $id);
        $update->execute();
        return $update;
    }

    public function eliminarCursoPorId($id)
    {
        $delete = $this->fluent->deleteFrom('cursos')->where('id', $id);
        $delete->execute();
        return $delete;
    }

    public function estaInscrito($idUsuario, $idCurso)
    {
        $where = array('usuario_id' => $idUsuario, 'curso_id' => $idCurso);
        $query = $this->fluent->from('cursos_usuarios')->where($where);
        return ($query->fetch()) ? true : false;
    }

    public function inscribir($idUsuario, $idCurso)
    {
        $values = array('usuario_id' => $idUsuario, 'curso_id' => $idCurso);
        $query = $this->fluent->insertInto('cursos_usuarios')->values($values);
        $insert = $query->execute();
        return $insert;
    }
}