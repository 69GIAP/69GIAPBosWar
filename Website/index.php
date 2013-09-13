<?php
	session_start();
	# cleans session variables in case user simply reloades index screen and tries to access a differnet layout
	if (!empty($_SESSION['game']))
	{
		unset($_SESSION['game']); 
	}
	if (!empty($_SESSION['username']))
	{
		unset($_SESSION['username']); 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>BosWar RofWar</title>

</head>

<!--  Link external CSS Master file containing all other CSS files -->
<link href="css/styles.css" rel="stylesheet" type="text/css" />

<body class="index">

    <div id="container"></div>
       
        <div id="indexRofBosWar">
        
        <p>Please select the version of the mission planner</p>

        		<!-- the variable "selection" is used to define the loaded stylesheet in the header -->
                    <form name="selectApplication" action="indexBosWarRofWar.php" method="post" class="RofWarBosWarSelection">                
        	            <input type="submit" name="selection" class="RofWar" value="RofWar" />
    	                <input type="submit" name="selection" class="BosWar" value="BosWar" />
	                </form>
                   
        </div>
        
	<div id="footer">
        <div id="credits">
            <p>brought to you by =69.GIAP=</p>
        </div>
	</div>

</body>

</html>