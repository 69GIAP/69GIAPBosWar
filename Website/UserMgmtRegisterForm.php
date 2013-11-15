<?php 

## Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

		<div id="container">
    
			<div id="content">
                <form id="registerForm" name="login" action="UserMgmtRegister.php" method="post">
                <h1 id="h1Form">Register</h1>
                  <fieldset id="inputs">
                  	<!-- test username validation-->
                    <div>
                    <input id="username" type="text"		name="username"			placeholder="Choose Username"	autofocus required/>
                    <span id="nameInfo">What's your name?</span>
                    </div>
                    <div>
                    <input id="email"		type="email"	name="email"		placeholder="Email Address"		required> 
                    <span id="emailInfo">Valid E-mail please, you will need it to log in!</span> 
                    </div> 
                    <div>                       
                    <input id="password1"	type="password"	name="password1"		placeholder="Choose Password"	required>
                    <span id="pass1Info">At least 5 characters: letters, numbers and '_'</span>
                    </div>
                    <div>
                    <input id="password2"	type="password"	name="password2"	placeholder="Repeat Password"	required>
                    <span id="pass2Info">Confirm password</span>
                    </div>
                    <div> 
                    <input id="phone"		type="text"		name="phone"		placeholder="Telephone Number"	required>
                    <span id="pass2Info">Please provide a phone number as contact in case of Emergency!</span>
                    </div>
                  </fieldset>
                  <fieldset id="actions">
                    <input id="registerSubmit" type="submit" value="Submit">
                  </fieldset>
                </form>
                 
				<script type="text/javascript" src="js\formValidation.js"></script>                
			</div>
          
		</div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
