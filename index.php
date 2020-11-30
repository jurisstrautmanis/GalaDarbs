<?php
if (isset($_GET["papa"])) {
    $file = __DIR__ . "/controllers/" . $_GET["papa"] . "Controller.php";
    session_start();

if (file_exists($file) && $_GET["papa"] === 'login' || $_GET["papa"] === 'register' || isset($_SESSION["id"])) {
    require_once $file;
} else {
  Header("Location: /gala_uzd/?papa=login");
}
}