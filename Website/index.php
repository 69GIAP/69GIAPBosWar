<?php
	# cleans out the session if the user visited already a subsection and loaded the index.php
	if (!empty ($session['game']))
		{
			session_destroy();
		}
		
	session_start();
	
	# clean session variables in case user simply reloades index screen and tries to access a different layout
	if (!empty($_SESSION['game']))
		{
			unset($_SESSION['game']); 
		}
	if (!empty($_SESSION['btn']))
		{
			unset($_SESSION['btn']); 
		}
	if (!empty($_SESSION['userRole']))
		{
			unset($_SESSION['userRole']); 
		}
	if (!empty($_SESSION['userRoleId']))
		{
			unset($_SESSION['userRoleId']); 
		}
	if (!empty($_SESSION['camp_db']))
		{
			unset($_SESSION['camp_db']); 
		}
	if (!empty($_SESSION['userName']))
		{
			unset($_SESSION['userName']);
		}
	if (!empty($_SESSION['userId']))
		{
			unset($_SESSION['userId']); 
		}
	if (!empty($_SESSION['userCoalId']))
		{
			unset($_SESSION['userCoalId']); 
		}									
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>BosWar RofWar</title>

</head>

<!--  Link external CSS Master file containing all other CSS files -->
<link href="css/BosWar_styles.css" rel="stylesheet" type="text/css" />

    <body class="index">
    
        <div id="container"></div>
                 
            <div id="indexRofBosWar">
            
            <p>Please click to select</p>
            
            <!-- the variable "selection" is used to define the loaded stylesheet in the header -->
            <form name="selectApplication" action="indexBosWarRofWar.php" method="post" class="RofWarBosWarSelection">                
                <input type="submit" name="selection" class="RofWar" value="RoF" />
                <input type="submit" name="selection" class="BosWar" value="BoS" />
            </form>
       
            </div>
                   
            <div id="footer">
                <div id="credits">
                    <p>brought to you by =69.GIAP=</p>
                </div>
        </div>
    
    </body>

</html>
