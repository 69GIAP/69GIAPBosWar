<?php 
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
		
        # open container
        echo "<div id=\"content\">\n";

/*  old version        
        # database connection
        $connection = mysql_connect("10.0.0.57:3306", "manager" , "manager") 
        or die("<p>Invalid query: Connection to database could not be established!</p>"); 
        
        mysql_select_db("boswar") or die ("<p>Database was no reachable!</p>"); 
old version end  */
        
        $username = $_POST["username"]; 
        $email = $_POST["email"]; 
        $password = $_POST["password"]; 
        $password2 = $_POST["password2"]; 
        $phone = $_POST["phone"]; 
		        
        if($password != $password2 OR $password == "" OR $username == "") 
            {
            echo "<p><b>Input Error!</b><br> Please fill all form fields correctly. <br></p>\n";
            echo "<form action=\"register.html\" >\n";
            echo "<input type=\"submit\" value=\"Back\">\n";
            echo "</form>\n";
            
        # close html document properly before exit
            echo "</div>\n";
            echo "<div id=\"bottom\">\n";
            echo    "<div id=\"credits\">\n";
            echo       "<p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>\n";
            echo       "<p>brought to you by =69.GIAP=</p>\n";
            echo    "</div>\n";
            echo "</div>\n";
            echo "</body>\n";
            echo "</html>\n";
            exit; 
            }
        # encrypt pasword   
        $password = md5($password); 
        
        # check datasets stored in the table to varify uniquness of new user
		$query = "SELECT id FROM users WHERE username LIKE '$username' ";        
		$result = mysqli_query($dbc, $query); 
		
        $values = mysqli_num_rows($result); 
        
        # if user does not exists a new entry will be stored to the table
        if($values == 0) 
            {
            $role = "viewer";
            
            $entry = "INSERT INTO users (username, password, email, phone, role) VALUES ('$username', '$password', '$email', '$phone', '$role')"; 
            $entries = mysqli_query($dbc, $entry); 
        
        # check if user was added correctly
            if($entries == true) 
                {
                echo "<p>User <b>$username</b> has been created.</p>\n";
                echo "<form action=\"login.html\" >\n";
                echo "<input type=\"submit\" value=\"Login\">\n";
                echo "</form>\n";
                } 
            else 
                { 
                echo "<p>Error adding the user.</p>\n"; 
                echo "<form action=\"register.html\" >\n";
                echo "<input type=\"submit\" value=\"Back\">\n";
                echo "</form>\n";			
                } 
            } 
        else 
            { 
            echo "<p>Username aready used.<br>\n";
            echo "<form action=\"register.html\" >\n";
            echo "<input type=\"submit\" value=\"Back\">\n";
            echo "</form>\n"; 
            }
            
        # close container
        echo "</div>\n";	 
        
        ?>
        
        <div id="bottom">
            <div id="credits">
                <p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>
                <p>brought to you by =69.GIAP=</p>
            </div>
        </div>
    
    </body>
    
</html>