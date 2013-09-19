<?php
    # check if the content is freed to display              
    if(!isset($_SESSION["username"])) 
        {	
			header("Location: loginForm.php");;
        }
?>        
