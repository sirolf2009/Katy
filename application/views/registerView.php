<html>
    <head>
        <title>Registeren</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css"/>
    </head>

    <body>
        <?php
        $this->load->view('commonHeader');
        echo form_open('register');
        ?>

        <div class="dlogin">
            <div class="texterea1">
                <div class="username1">
                    <P>Nieuwe Gebruikersnaam:</p>
                </div>
                <!--<TEXTAREA style="position: absolute; left: 360px; top: 110px;" ROWS=2 COLS=50 class ="invoervak1"></TEXTAREA>-->
                <input type="text" name="username" value="<?php echo set_value('username'); ?>" style="position: absolute; left: 360px; top: 110px;" ROWS=2 COLS=50 class ="invoervak1"/>
            </div>
            <div class="texterea2">
                <div class="password1">
                    <P>Nieuwe Wachtwoord:</p>
                </div>
                <!--<TEXTAREA style="position: absolute; left: 360px; top: 175px;" ROWS=2 COLS=50 class ="invoervak2"></TEXTAREA>-->
                <input type="password" name="password" value="" style="position: absolute; left: 360px; top: 175px;" ROWS=2 COLS=50 class ="invoervak2"/>
            </div>
            <div class="texterea2">
                <div class="password1">
                    <P>Bevestig Wachtwoord:</p>
                </div>
                <input type="password" name="passwordConf" value="" style="position: absolute; left: 360px; top: 240px;" ROWS=2 COLS=50 class="invoervak2"/>
            </div>
            <div class="texterea2">
                <div class="password1">
                    <P>E-mail:</p>
                </div>
                <!--<TEXTAREA style="position: absolute; left: 360px; top: 240px;" ROWS=2 COLS=50 class ="invoervak3"></TEXTAREA>-->
                <input type="text" name="email" value="<?php echo set_value('email'); ?>" style="position: absolute; left: 360px; top: 305px;" ROWS=2 COLS=50 class ="invoervak2"/>
                <br>
                <?php echo validation_errors(); ?>
            </div>
            <div style="float:right">
                <?php
                require_once(__DIR__ . '/../libraries/CAPTCHA/recaptchalib.php');
                $publickey = "6Lco_OgSAAAAAOwV-J4dSISJzAJYVh436CyeRa3M";
                echo recaptcha_get_html($publickey);
                ?>
            </div>
            <div class="dregistreren">
                <input type="submit" value="Submit"/>
            </div>
        </div>
    </form>
    <?php $this->load->view('footer'); ?>
</body>
</html>