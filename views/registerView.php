<?php
    require_once __DIR__ . "/../components/userForm.php";
    require_once __DIR__ . "/../database_wrapper.php";

    class RegisterView {
      
        public function html() {
            $form = new UserForm();
            $form->setBtnText("Register");
            $form->setGenderOpt('</br>Gender</br>
            <label>
                <input type="radio" id="male" name="gender" value="male" checked="checked">
                Male
            </label><br>
                <label>
                    <input type="radio" id="female" name="gender" value="female" >
                    Female
                </label><br>');
            $form->html();
        }
    }
?>