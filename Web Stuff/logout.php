<?php
# creates a new session for tracking the user is logged on
session_start(); 
# Incorporate the MySQL debug script.
require ( 'debug.php' );
# Incorporate the MySQL connection script.
require ( '../connect_db.php' );
?>
<?php include 'header.php'; ?>

    <body>
    
        <div id="top">
            <div id="title"></div>
        
            <ul id="navigation">
              <li><a href="#" class="menu1"><span></span></a></li>
              <li><a href="#" class="menu2"><span></span></a></li>
            </ul>
            <ul id="register">
              <li><a href="register_form.php" class="register"><span></span></a></li>
              <li><a href="login_form.php" class="login"><span></span></a></li>
            </ul>
        </div>
         
        <div id="left"></div>
        
        <?php 
        
        # check to make sure the session variable is registered 
        if(isset($_SESSION["username"])){ 
        
        # session variable is registered, the user is ready to logout 
        session_unset(); 
        session_destroy(); 
		header("Location: index.php");
        } 
        else
        { 
        # the session variable isn't registered, the user shouldn't even be on this page 
        header("Location: index.php" ); 
        }
		
        ?>
         
<?php include 'footer.php'; ?>
