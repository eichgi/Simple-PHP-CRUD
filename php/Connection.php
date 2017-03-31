<?php
require('FluentPDO/FluentPDO.php');

try {

    $pdo = new PDO("mysql:host=localhost;dbname=blog", "user", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec("set charset utf8");

    $fluent = new FluentPDO($pdo);

} catch (PDOException $e) {
    echo "Error al conectar la base de datos" . $e->getMessage();
}
