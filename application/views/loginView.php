<html>

    <head>
        <title>redelijk</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css" />
        <script>

            window.fbAsyncInit = function() {
                FB.init({
                    appId: '420790334688572', // App ID
                    channelUrl: '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
                    status: true, // check login status
                    cookie: true, // enable cookies to allow the server to access the session
                    xfbml: true  // parse XFBML
                });
                //TODO logging out
                FB.Event.subscribe('auth.authResponseChange', function(response) {
                    if (response.status === 'connected') {
                        FB.api('/me', function(response) {
                            var username = response.username;
                            var birthday = response.birthday.replace("/","-").replace("/","-");
                            alert(response.email);
                            var email = response.email;
                            window.location = "login/LoginFacebook/"+username+"/"+birthday+"/"+email;
                        });
                    } else if (response.status === 'not_authorized') {
                        FB.login();
                    } else {
                        FB.login();
                    }
                });
            };

            (function(d) {
                var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement('script');
                js.id = id;
                js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                ref.parentNode.insertBefore(js, ref);
            }(document));
        </script>

    </head>
    <body>
        <?php
        $this->load->view('commonHeader');
        echo form_open('login');
        ?>

        <div class ="dlogin">
            <div class ="texterea1">
                <div class ="username1">
                    <P>Username:</p>
                </div>
                <!--<TEXTAREA style="position: absolute; left: 360px; top: 110px;" ROWS=2 COLS=50 class ="invoervak1"></TEXTAREA>-->
                <input type="text" name="username" value="" class="invoervak2" style="position: absolute; left: 360px; top: 110px;" ROWS=2 COLS=50 class ="invoervak1" />
            </div>
            <div class ="texterea2">
                <div class ="password1">
                    <P>Password:</p>
                </div>
                <!--<TEXTAREA  style="position: absolute; left: 360px; top: 173px;" ROWS=2 COLS=50 class ="invoervak2"></TEXTAREA>-->
                <input type="password" name="password" value=""  style="position: absolute; left: 360px; top: 173px;" ROWS=2 COLS=50 class ="invoervak2"/>
<?php echo validation_errors(); ?>								
            </div>
            <div class="daanmelden">
                <input type="submit" value="Submit" />
                </form>


                <?php echo form_open('login/LoginFacebook');
                ?>
            </div>
            <div class = "facebookdesign">
                <fb:login-button width="200" name="fbuser" scope="email, user_birthday" show-faces="true" autologoutlink="true" >Log in met Facebook!</fb:login-button>
            </div>
        </form>


    </div>
    <div style="position: absolute; left: 680px; top: 83px;" class ="data">
        <img src="http://localhost/rsc/images/data_peeps.jpg" width="680" height="500">
    </div>
<?php $this->load->view('footer'); ?>
</body>
</html>