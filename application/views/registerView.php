<html>
	<head>
		<title>Registeren</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/rsc/CSS/CSS_for_e-learning.css"/>
	</head>
	
	<body>
		<div class="dwelkom">
		
		</div>
		
		<?php echo validation_errors(); ?>
		<?php echo form_open('register'); ?>
		
		<div class="dlogin">
			<div class="texterea1">
				<div class="username1">
					<P>New Username:</p>
				</div>
				<!--<TEXTAREA style="position: absolute; left: 360px; top: 110px;" ROWS=2 COLS=50 class ="invoervak1"></TEXTAREA>-->
				<input type="text" name="Username" value="" size="50"/>
			</div>
			<div class="texterea2">
				<div class="password1">
					<P>New Password:</p>
				</div>
				<!--<TEXTAREA style="position: absolute; left: 360px; top: 175px;" ROWS=2 COLS=50 class ="invoervak2"></TEXTAREA>-->
				<input type="password" name="Password" value="" size="50"/>
			</div>
			<div class="texterea3">
				<div class="e-mail1">
					<P>E-mail:</p>
				</div>
				<!--<TEXTAREA style="position: absolute; left: 360px; top: 240px;" ROWS=2 COLS=50 class ="invoervak3"></TEXTAREA>-->
				<input type="text" name="Email" value="" size="50"/>
			</div>
			<div class="dregistreren">
				<input type="submit" value="Submit"/>
			</div>
		</div>
		</form>
	</body>
</html>