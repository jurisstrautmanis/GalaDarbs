<?php
    require_once __DIR__ . "/../views/registerView.php";
    require_once __DIR__ . "/../database_wrapper.php";


    if (!empty($_POST["nickname"]) && !empty($_POST["password"]) && !empty($_POST["gender"])) {
        var_dump("can save");
        $nickname = $_POST["nickname"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $gender = $_POST["gender"];

        var_dump($password);
        $sql = "INSERT INTO users 
        (nickname, password, gender) 
        VALUES ('$nickname', '$password', '$gender')";

        DB::run($sql);
        Header("Location: /gala_uzd/?papa=login");
    } else {
        echo "Some fields are missing";
    }
    $view = new RegisterView();
    $view->html();

    ?> <a href="/gala_uzd/?papa=login" style="display: flex; justify-content:center; font-family:Arial, Helvetica, sans-serif">Login</a>
         <?php 
?>