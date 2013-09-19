	<div id="footer">
    
		<?php
		# reference the username next to the navigation bar              
		include 'includes/loggedOnInfo.php';

		#dynamic footer information
		if ($game == "RoF")
			{
				echo "<div id=\"credits\">\n";
				echo "<p>An unofficial addon for Rise of Flight</p>\n";
				echo "<p>brought to you by =69.GIAP=</p>\n";
				echo "</div>\n";
			}
		if ($game == "BoS")
			{
				echo "<div id=\"credits\">\n";
				echo "<p>An unofficial addon for IL2 STURMOVIK - Battle of Stalingrad</p>\n";
				echo "<p>brought to you by =69.GIAP=</p>\n";
				echo "</div>\n";
			}
        ?>

	</div>

	</body>

</html>

