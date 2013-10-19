<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
				<?php           
                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);
                    if	(
                            (
                                    ($_FILES["file"]["type"] == "image/gif")
                                ||	($_FILES["file"]["type"] == "image/jpeg")
                                ||	($_FILES["file"]["type"] == "image/jpg")
                                ||	($_FILES["file"]["type"] == "image/pjpeg")
                                ||	($_FILES["file"]["type"] == "image/x-png")
                                ||	($_FILES["file"]["type"] == "image/png")
                            )
                                && ($_FILES["file"]["size"] < 2000000)
                                && in_array($extension, $allowedExts)
                        )
                      {
                      if ($_FILES["file"]["error"] > 0)
                        {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                        }
                      else
                        {
                        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                        echo "Type: " . $_FILES["file"]["type"] . "<br>";
                        echo "Size: " . (round ($_FILES["file"]["size"] / 1024 /1024, 2)) . " MB<br>";
                        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
                    
                        if (file_exists("C:/BOSWAR/" . $_FILES["file"]["name"]))
                          {
                          echo $_FILES["file"]["name"] . " already exists. ";
                          }
                        else
                          {
                          move_uploaded_file($_FILES["file"]["tmp_name"],
                          "C:/BOSWAR/" . $_FILES["file"]["name"]);
                          echo "Stored in: " . "C:/BOSWAR/" . $_FILES["file"]["name"];
                          }
                        }
                      }
                    else
                      {
                      echo "Invalid file";
                      }
                ?> 
		</div>
    
	</div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/footer.php' );
?>
