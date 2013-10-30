<html>
	
     <head>
        <title>redelijk</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css" />

		<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '420790334688572', // App ID
      channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
    // Additional init code here
  };
  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '420790334688572', // App ID
    channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
     console.log('Good to see you, ' + response.name + '.');
    });
		
   
  }
</script>

		
		
		
     </head>
	<body>
            <?php $this->load->view('commonHeader');
            echo form_open('login'); ?>
            
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
                </div>
				<div class = "facebookdesign">
                    <fb:login-button width="400" show-faces="true" autologoutlink="true" >Log in met facebook!</fb:login-button>
                </div>
				
            </div>
            <div style="position: absolute; left: 680px; top: 83px;" class ="data">
                <img src="http://localhost/rsc/images/data_peeps.jpg" width="680" height="500">
            </div>
            </form>
            <?php $this->load->view('footer'); ?>
        </body>
</html>