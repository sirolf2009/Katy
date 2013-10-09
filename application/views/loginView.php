<html>
	
     <head>
        <title>redelijk</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css" />
            
         
     </head>
	<body>
            
            <div class ="dwelkom">
                <input type="submit" value="Register" class="dafmelden" onclick="location.href = 'http://localhost/index.php/register'">
            </div>
            
            <?php echo validation_errors(); ?>
            <?php echo form_open('login'); ?>
            
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
                </div>
                <div class="daanmelden">
                    <input type="submit" value="Submit" />
                </div>
             
            </div>
            <div style="position: absolute; left: 680px; top: 83px;" class ="data">
                <img src="http://localhost/rsc/images/data_peeps.jpg" width="680" height="500">
            </div>
            </form>
	</body>
</html>