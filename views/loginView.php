<?php
    require_once __DIR__ . "/../components/userForm.php";
    require_once __DIR__ . "/../database_wrapper.php";

    class LoginView {
      
        public function html() {
            $form = new UserForm();
            $form->setBtnText("Login");
            $form->html();
        }
    }
?>