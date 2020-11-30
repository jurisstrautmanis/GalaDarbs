<?php

require_once __DIR__ . "/../components/userForm.php";
require_once __DIR__ . "/../database_wrapper.php";

            if (!empty($_POST["nickname"])) {
                $nickname = $_POST["nickname"];
        
                $sql = "SELECT * FROM users WHERE nickname = '$nickname'";
        
                $response = DB::run($sql)->fetch_assoc();
        
                if ($response) {
                    if (!empty($_POST["password"])) {
                        $isValidPassword = password_verify(
                            $_POST["password"],
                            $response["password"]
                        );
        
                        if ($isValidPassword) {
                            session_start();
                            $_SESSION["id"] = $response["nickname"];
                            Header("Location: /gala_uzd/?papa=list");
                            // echo "You have logged in";
                        } else {
                            echo "Invalid password";
                        }
                    } else {
                        echo "Password not set";
                    }
                } else {
                    echo "User with nickname: '$nickname' does not exist";
                } 
    }

    $form = new UserForm();
    $form->setBtnText("Login");
    $form->html();

    ?> <a href="/gala_uzd/?papa=register" style="display: flex; justify-content:center; font-family:Arial, Helvetica, sans-serif">Register</a>
         <?php 

?>