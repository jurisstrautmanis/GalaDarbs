<?php
require_once __DIR__ . "/../database_wrapper.php";

    class UserForm {
        private $btnText;
        private $genderOpt;

    public function html() {
        ?>
        <div style="display: flex; justify-content:center;">

            <form method="POST" style="display:flex; flex-direction:column; border:1px solid pink; background: rgba(160,23,32, 0.04); width:max-content; height:max-content; padding:50px; border-radius:8px;">
                <label style="font-family: Arial, Helvetica, sans-serif;">
                    Nickname
    
                    <input name="nickname">
                </label>
                <label style="font-family: Arial, Helvetica, sans-serif; padding-top:10px;">
                    Password
    
                    <input type="password" name="password">
                </label>
                
                <?=  $this->getGenderOpt()?>
    
                <button type="submit" style="width: 222px; margin-top:10px; height:30px; font-size:large"><?= $this->getBtnText() ?></button>
            </form>
        </div>
        <?php
    }

    public function setBtnText($text) {
        $this->btnText = $text;
       }
       public function getBtnText() {
           return $this->btnText;
       }

    public function setGenderOpt($gopt) {
        $this->genderOpt = $gopt;
       }
       public function getGenderOpt() {
           return $this->genderOpt;
       }
    }
?>