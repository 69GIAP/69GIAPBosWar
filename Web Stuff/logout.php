<?php
# creates a new session for tracking the user is logged on
session_start(); 
# Incorporate the MySQL debug script.
require ( 'debug.php' );
# Incorporate the MySQL connection script.
require ( '../connect_db.php' );
?>
!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOSWAR ::SECRET::</title>
<!--  Link external CSS Master file containing all other CSS files -->
<link href="css/JavaCSS/BOSWAR_AllStyles.css" rel="stylesheet" type="text/css" />
<!-- Include jQuery Library -->
<script src="js/JavaCSS/jquery-1.2.2.pack.js" type="text/javascript"></script>

<!-- Let's do the animation -->
<script type="text/javascript" src="js/JavaCSS/animation.js"></script>

</head>

    <body>
    
        <div id="top">
            <div id="title"></div>
        
            <ul id="navigation">
              <li><a href="#" class="menu1"><span></span></a></li>
              <li><a href="#" class="menu2"><span></span></a></li>
            </ul>
            <ul id="register">
              <li><a href="register.html" class="register"><span></span></a></li>
              <li><a href="login.html" class="login"><span></span></a></li>
            </ul>
        </div>
         
        <div id="left"></div>
        
        <?php 
        
        # check to make sure the session variable is registered 
        if(isset($_SESSION["username"])){ 
        
        # session variable is registered, the user is ready to logout 
        session_unset(); 
        session_destroy(); 
		header("Location: index.html");
        } 
        else
        { 
        # the session variable isn't registered, the user shouldn't even be on this page 
        header("Location: index.html" ); 
        }
		
        ?>
         
        <div id="bottom">
            <div id="credits">
                <p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>
                <p>brought to you by =69.GIAP=</p>
            </div>
        </div>
        
    </body>
    
</html>