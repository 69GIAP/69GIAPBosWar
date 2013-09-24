<?php
    # check if the content is freed to display              
    if(!isset($_SESSION["userName"])) 
        {	
			header("Location: loginForm.php");;
        }
?>        
