	<div id="footer">
    
		<?php
		#Stenka 17/11/13 Referening giap website
		# reference the username next to the navigation bar              
		include 'includes/loggedOnInfo.php';

		#dynamic footer information
		if ($sim == "RoF")
			{
				echo "<div id=\"credits\">\n";
				echo "<p>An unofficial add-on for Rise of Flight brought to you by =69.GIAP=<br />\n";
				echo "Flight simulator wargaming at its finest!<br />
                    Visit us at <a href=\"http://www.69giap.com\">www.69giap.com</a></p>\n";
				echo "</div>\n";
			}
		if ($sim == "BoS")
			{
				echo "<div id=\"credits\">\n";
				echo "<p>An unofficial add-on for IL2 STURMOVIK - Battle of Stalingrad brought to you by =69.GIAP=<br />\n";
				echo "Flight simulator wargaming at it's finest!<br />
                    Visit us at <a href=\"http://www.69giap.com\">www.69giap.com</a></p>\n";
				echo "</div>\n";
			}
        ?>

	</div>

	</body>

</html>

