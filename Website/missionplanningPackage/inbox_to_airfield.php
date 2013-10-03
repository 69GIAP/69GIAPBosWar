# V1.1
# Stenka 18/9/13 Operational
# Php version of inbox table to load into airfields table runs after inbox load
<?php
# require is connecting user peter to stalingrad1 database
require('require.php');
# initialise variables
# the id of start of Airfield header in inbox is id_af_inbox
$id_af_inbox = 0;
# the id of start of Airfield trailer in inbox is id_af_trail_inbox
$id_af_trail_inbox = 0; 
# The name of the airfield being processed is $af_Name
$af_Name = str_pad("Airfield with no name",80);
# the id of airfield in airfields is $af_id
$af_id = 0 ;
# 
$l3 = str_pad(" ",200);
$af_Index =0;
$l4	= str_pad(" ",200);
$af_LinkTrid  =0;
$l5	= str_pad(" ",200);
$af_Xpos  =0;
$l6	= str_pad(" ",200);
$af_Ypos =0;
$l7	= str_pad(" ",200);
$af_Zpos  =0;
$l8	= str_pad(" ",200);
$l9 = str_pad(" ",200);
$af_YOri =0;
$l10 = str_pad(" ",200);
$l11 = str_pad(" ",200);
$l12 = str_pad(" ",200);
$l13 = str_pad(" ",200);
$af_Country	= str_pad(" ",3);
$l14 = str_pad(" ",16);
$l15 = str_pad(" ",200);
$l16 = str_pad(" ",200);
$l17 = str_pad(" ",200);
$l19 = str_pad(" ",200);
# this is where I have to check for planes
$l20 = str_pad(" ",200);
$l21 = str_pad(" ",200);
$l22 = str_pad(" ",200);
$l23 = str_pad(" ",200);
$l24 = str_pad(" ",200);
$l25 = str_pad(" ",200);
$l26 = str_pad(" ",200);
$l27 = str_pad(" ",200);
$l28 = str_pad(" ",200);
$l29 = str_pad(" ",200);
$l30 = str_pad(" ",200);
$l31 = str_pad(" ",200);
$l32 = str_pad(" ",200);
# mcu index must match af_LinkTrid
$mcu_Index =0;
$l33 = str_pad(" ",200);
$l34 = str_pad(" ",200);
$l35 = str_pad(" ",200);
$l36 = str_pad(" ",200);
$l37 = str_pad(" ",200);
# mcu x & z sould match airfield
$l38 = str_pad(" ",200);
$l39 = str_pad(" ",200);
$l40 = str_pad(" ",200);
$l41 = str_pad(" ",200);
$l42 = str_pad(" ",200);
$l43 = str_pad(" ",200);
$af_Enabled ="1";
$l44 = str_pad(" ",200);
# MisObjID should match af_Index
$l45 = str_pad(" ",200);
$l46 = str_pad(" ",200);
$p1_Number = '-1';
$p1_Model = str_pad(" ",80);
$p2_Number = '-1';
$p2_Model = str_pad(" ",80);
$p3_Number = '-1';
$p3_Model = str_pad(" ",80);
$p4_Number = '-1';
$p4_Model = str_pad(" ",80);
$p5_Number = '-1';
$p5_Model = str_pad(" ",80);
$p6_Number = '-1';
$p6_Model = str_pad(" ",80);

# start of processing
$q='SELECT id FROM inbox WHERE LEFT(lin,8) = "Airfield"';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Selected airfields</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
			echo'<br>airfield starts on line'.$row[0];
			$id_af_inbox = $row[0];
			# here we pick out the airfield name from inbox and check if it exists in airfields then insert if not
			$search_no = 2+$row[0];
			echo'<br>Therefore the name of the airfield is on line'.$search_no;
			$q1="SELECT LEFT(data_value,80) FROM inbox WHERE id = $search_no";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				while ($row2 = mysqli_fetch_array($r1,MYSQLI_NUM))
				{
					echo'<br>row two '.$row2[0];
					$data_name = str_pad(($row2[0]),80);
					echo'<br>data_name '.$data_name.'needs searching for in airfields';
					$q2 = "SELECT id from airfields where af_Name = '$data_name' LIMIT 1";
					$r2 = mysqli_query($dbc,$q2);
					$r2_data = mysqli_fetch_row($r2);
					$result=$r2_data[0];
					echo '<br>My r2 data search in airfields has found'.$result; 
					if ($result >0 )
						{echo '<br>I found someone';}
					else
						{echo '<br>didnt find anyone';
						$q3="INSERT INTO airfields (af_Name) VALUES ('$data_name')";
						$r3= mysqli_query($dbc,$q3);
						if ($r3)
							{echo'<br>airfield added'.$r2_data[0];}
						else
							{echo'<p>'.mysqli_error($dbc).'</p>';} 
						}
				}

			}
			else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
			mysqli_free_result($r1);
			#  end of section where I deal with the name
			# start of data load from inbox to airfield
			# Find the id of airfield in airfields
			$q2="SELECT id from airfields WHERE af_Name = ('$data_name')";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> Id in airfields is".$r2_data[0];
					$af_id = $r2_data[0];	
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}
			$search_no = 3+$id_af_inbox;
			echo'<br>Therefore the Index is on line'.$search_no;
			$q2="SELECT data_dec_value,data_value,lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> Index is".$r2_data[0];
					$af_Index=$r2_data[0];
					$l4=$r2_data[2];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
			$search_no = 4+$id_af_inbox;
			echo'<br>Therefore the af_LinkTrid is on line'.$search_no;
			$q2="SELECT data_dec_value,data_value,lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> af_LinkTrid is".$r2_data[0];
					$af_LinkTrid=$r2_data[0];
					$l5=$r2_data[2];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
				$search_no = 5+$id_af_inbox;
			echo'<br>Therefore the af_Xpos is on line'.$search_no;
			$q2="SELECT data_dec_value,data_value,lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> af_Xpos is".$r2_data[0];
					$af_Xpos=$r2_data[0];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
			
			$search_no = 6+$id_af_inbox;
			echo'<br>Therefore the af_Ypos is on line'.$search_no;
			$q2="SELECT data_dec_value,data_value,lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> af_Ypos is".$r2_data[0];
					$af_Ypos=$r2_data[0];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
				
			$search_no = 7+$id_af_inbox;
			echo'<br>Therefore the af_Zpos is on line'.$search_no;
			$q2="SELECT data_dec_value,data_value,lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> af_Zpos is".$r2_data[0];
					$af_Zpos=$r2_data[0];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
				
			$search_no = 9+$id_af_inbox;
			echo'<br>Therefore the af_YOri is on line'.$search_no;
			$q2="SELECT data_dec_value,data_value,lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> af_YOri is".$r2_data[0];
					$af_YOri=$r2_data[0];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}

			$search_no = 13+$id_af_inbox;
			echo'<br>Therefore the af_Country is on line'.$search_no;
			$q2="SELECT data_value FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					echo "<br> af_Country is".$r2_data[0];
					$af_Country=$r2_data[0];
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
# now lines 3 to 19 in text form				
				
			$search_no = 2+$id_af_inbox;
			echo'<br>Lines 3 - 19:'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l3=$r2_data[0];
					echo "<br>Line contains here:".$l3;	
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}				
			$search_no = 3+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l4=$r2_data[0];
					echo "<br>Line contains here:".$l4;					
				}	
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}				
			$search_no = 4+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l5=$r2_data[0];
					echo "<br>Line contains here:".$l5;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	
			$search_no = 5+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l6=$r2_data[0];
					echo "<br>Line contains here:".$l6;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	
			$search_no = 6+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l7=$r2_data[0];
					echo "<br>Line contains here:".$l7;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	
				
			$search_no = 7+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l8=$r2_data[0];
					echo "<br>Line contains here:".$l8;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	

			$search_no = 8+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l9=$r2_data[0];
					echo "<br>Line contains here:".$l9;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	

			$search_no = 9+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l10=$r2_data[0];
					echo "<br>Line contains here:".$l10;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	

			$search_no = 10+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l11=$r2_data[0];
					echo "<br>Line contains here:".$l11;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 11+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l12=$r2_data[0];
					echo "<br>Line contains here:".$l12;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 12+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l13=$r2_data[0];
					echo "<br>Line contains here:".$l13;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 13+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l14=$r2_data[0];
					echo "<br>Line contains here:".$l14;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 14+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l15=$r2_data[0];
					echo "<br>Line contains here:".$l15;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 15+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l16=$r2_data[0];
					echo "<br>Line contains here:".$l16;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 16+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l17=$r2_data[0];
					echo "<br>Line contains here:".$l17;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	



			$search_no = 17+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l18=$r2_data[0];
					echo "<br>Line contains here:".$l18;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	


			$search_no = 18+$id_af_inbox;
			echo'<br>Lines 3 - 19'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$l19=$r2_data[0];
					echo "<br>Line contains here:".$l19;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}	
# now we must find the trentity
			echo "<br> Searching for af_LinkTrid :";
			$q2="SELECT id FROM inbox WHERE data_dec_value = $af_LinkTrid AND substr(lin,1,9) = '  Index =' LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$id_af_trail_inbox = ($r2_data[0] -13);
					echo "<br>Line no for trailer:".$id_af_trail_inbox;					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}
# OK start reading trailer
			$counter=0;
			while ($counter < 26)
			{
			$search_no = $counter+$id_af_trail_inbox;
			echo'<br>Lines 20 - 46'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				if ($r2_data[0]) 
				{
					$varvalue = '$l'.($counter+20);
					$$varvalue = $r2_data[0];
					echo "<br>Line contains here:".$r2_data[0];					
				}	
				else
					{echo'<p>'.mysqli_error($dbc).'</p>';}				
			$counter = $counter+1;
			}
# lets grab planes 1 to 6
# the id of start of Airfield header in inbox is id_af_inbox
# first plane would appear on line 22
			$search_no = 21+$id_af_inbox;
			echo'<br>Therefore the first plane could be on'.$search_no;
			$q2="SELECT lin FROM inbox WHERE id = $search_no LIMIT 1";
			$r2=mysqli_query($dbc,$q2);
			$r2_data = mysqli_fetch_row($r2);
				$test = substr($r2_data[0],1,7);
				if ($test = '  Plane') 
				{
					echo '<br> We have found a plane';
# grabbing quantity of first plane					
					$search_no2 = 24+$id_af_inbox;
					echo'<br>Therefore the qty first plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,6);	
					if ($test2 = 'Number')
					{
						$temp_str = substr($r3_data[0],16,10);
						$temp_str = str_replace(';','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p1_Number = $temp_str;
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}										
# grabbing model of first plane 
					echo '<br>Looking for model';
					$search_no2 = 37+$id_af_inbox;
					echo'<br>Therefore the model of first plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,5);	
					if ($test2 = 'Model')
					{
						$temp_str = $r3_data[0];
						echo '<br> Model is '.$temp_str; 						
						$temp_str = str_replace('.mgm";','',$temp_str);
						echo '<br> Model is '.$temp_str; 		
						$temp_str = substr($temp_str,31,50);
						echo '<br> Peter Model is '.$temp_str; 		
						$temp_str = str_replace(' ','',$temp_str);
						echo '<br> Position'.strpos($temp_str,"\\");
						while (strpos($temp_str,"\\") >0)
						{
							$temp_str = substr($temp_str,2,50);
							echo '<br> hello '.$temp_str; 								
						}
						$temp_str = str_replace('\\','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p1_Model = $temp_str;
						echo '<br> Model finaly is '.$p1_Model; 
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}
# start second plane	
# grabbing quantity of second plane					
					$search_no2 = 21+24+$id_af_inbox;
#					echo'<br>Therefore the qty second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,6);	
					if ($test2 = 'Number')
					{
						$temp_str = substr($r3_data[0],16,10);
						$temp_str = str_replace(';','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p2_Number = $temp_str;
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}										
# grabbing model of second plane 
					echo '<br>Looking for model';
					$search_no2 = 21+37+$id_af_inbox;
#					echo'<br>Therefore the model of second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,5);	
					if ($test2 = 'Model')
					{
						$temp_str = $r3_data[0];
#						echo '<br> Model is '.$temp_str; 						
						$temp_str = str_replace('.mgm";','',$temp_str);
#						echo '<br> Model is '.$temp_str; 		
						$temp_str = substr($temp_str,31,50);
#						echo '<br> Peter Model is '.$temp_str; 		
						$temp_str = str_replace(' ','',$temp_str);
#						echo '<br> Position'.strpos($temp_str,"\\");
						while (strpos($temp_str,"\\") >0)
						{
							$temp_str = substr($temp_str,2,50);
#							echo '<br> hello '.$temp_str; 								
						}
						$temp_str = str_replace('\\','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p2_Model = $temp_str;
						echo '<br> Second Model finaly is '.$p2_Model; 
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}
# start third plane	
# grabbing quantity of third plane					
					$search_no2 = 21+21+24+$id_af_inbox;
#					echo'<br>Therefore the qty second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,6);	
					if ($test2 = 'Number')
					{
						$temp_str = substr($r3_data[0],16,10);
						$temp_str = str_replace(';','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p3_Number = $temp_str;
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}										
# grabbing model of second plane 
					echo '<br>Looking for model';
					$search_no2 = 21+21+37+$id_af_inbox;
#					echo'<br>Therefore the model of second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,5);	
					if ($test2 = 'Model')
					{
						$temp_str = $r3_data[0];
#						echo '<br> Model is '.$temp_str; 						
						$temp_str = str_replace('.mgm";','',$temp_str);
#						echo '<br> Model is '.$temp_str; 		
						$temp_str = substr($temp_str,31,50);
#						echo '<br> Peter Model is '.$temp_str; 		
						$temp_str = str_replace(' ','',$temp_str);
#						echo '<br> Position'.strpos($temp_str,"\\");
						while (strpos($temp_str,"\\") >0)
						{
							$temp_str = substr($temp_str,2,50);
#							echo '<br> hello '.$temp_str; 								
						}
						$temp_str = str_replace('\\','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p3_Model = $temp_str;
						echo '<br> Second Model finaly is '.$p2_Model; 
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}
# start fourth plane	
# grabbing quantity of plane					
					$search_no2 = 21+21+21+24+$id_af_inbox;
#					echo'<br>Therefore the qty second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,6);	
					if ($test2 = 'Number')
					{
						$temp_str = substr($r3_data[0],16,10);
						$temp_str = str_replace(';','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p4_Number = $temp_str;
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}										
# grabbing model of plane 
					echo '<br>Looking for model';
					$search_no2 = 21+21+21+37+$id_af_inbox;
#					echo'<br>Therefore the model of second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,5);	
					if ($test2 = 'Model')
					{
						$temp_str = $r3_data[0];
#						echo '<br> Model is '.$temp_str; 						
						$temp_str = str_replace('.mgm";','',$temp_str);
#						echo '<br> Model is '.$temp_str; 		
						$temp_str = substr($temp_str,31,50);
#						echo '<br> Peter Model is '.$temp_str; 		
						$temp_str = str_replace(' ','',$temp_str);
#						echo '<br> Position'.strpos($temp_str,"\\");
						while (strpos($temp_str,"\\") >0)
						{
							$temp_str = substr($temp_str,2,50);
#							echo '<br> hello '.$temp_str; 								
						}
						$temp_str = str_replace('\\','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p4_Model = $temp_str;
						echo '<br> Second Model finaly is '.$p2_Model; 
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}

# start fifth plane	
# grabbing quantity of plane					
					$search_no2 = 21+21+21+21+24+$id_af_inbox;
#					echo'<br>Therefore the qty second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,6);	
					if ($test2 = 'Number')
					{
						$temp_str = substr($r3_data[0],16,10);
						$temp_str = str_replace(';','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p5_Number = $temp_str;
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}										
# grabbing model of plane 
					echo '<br>Looking for model';
					$search_no2 = 21+21+21+21+37+$id_af_inbox;
#					echo'<br>Therefore the model of second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,5);	
					if ($test2 = 'Model')
					{
						$temp_str = $r3_data[0];
#						echo '<br> Model is '.$temp_str; 						
						$temp_str = str_replace('.mgm";','',$temp_str);
#						echo '<br> Model is '.$temp_str; 		
						$temp_str = substr($temp_str,31,50);
#						echo '<br> Peter Model is '.$temp_str; 		
						$temp_str = str_replace(' ','',$temp_str);
#						echo '<br> Position'.strpos($temp_str,"\\");
						while (strpos($temp_str,"\\") >0)
						{
							$temp_str = substr($temp_str,2,50);
#							echo '<br> hello '.$temp_str; 								
						}
						$temp_str = str_replace('\\','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p5_Model = $temp_str;
						echo '<br> Second Model finaly is '.$p2_Model; 
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}

# start sixth plane	
# grabbing quantity of plane					
					$search_no2 = 21+21+21+21+21+24+$id_af_inbox;
#					echo'<br>Therefore the qty second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,6);	
					if ($test2 = 'Number')
					{
						$temp_str = substr($r3_data[0],16,10);
						$temp_str = str_replace(';','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p6_Number = $temp_str;
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}										
# grabbing model of plane 
					echo '<br>Looking for model';
					$search_no2 = 21+21+21+21+21+37+$id_af_inbox;
#					echo'<br>Therefore the model of second plane will be on'.$search_no2;
					$q3="SELECT lin FROM inbox WHERE id = $search_no2 LIMIT 1";
					$r3=mysqli_query($dbc,$q3);
					$r3_data = mysqli_fetch_row($r3);
					$test2 = substr($r3_data[0],7,5);	
					if ($test2 = 'Model')
					{
						$temp_str = $r3_data[0];
#						echo '<br> Model is '.$temp_str; 						
						$temp_str = str_replace('.mgm";','',$temp_str);
#						echo '<br> Model is '.$temp_str; 		
						$temp_str = substr($temp_str,31,50);
#						echo '<br> Peter Model is '.$temp_str; 		
						$temp_str = str_replace(' ','',$temp_str);
#						echo '<br> Position'.strpos($temp_str,"\\");
						while (strpos($temp_str,"\\") >0)
						{
							$temp_str = substr($temp_str,2,50);
#							echo '<br> hello '.$temp_str; 								
						}
						$temp_str = str_replace('\\','',$temp_str);
						$temp_str = str_replace(' ','',$temp_str);
						$p6_Model = $temp_str;
						echo '<br> Second Model finaly is '.$p2_Model; 
					}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';}

# end of six planes
						}
					
				else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
				
# starting update of records	
			$q3="UPDATE airfields set 
			af_Index = $af_Index,
			af_LinkTrid = $af_LinkTrid,
			af_Xpos = $af_Xpos,
			af_Ypos = $af_Ypos,
			af_Zpos = $af_Zpos,
			af_YOri=$af_YOri,
			af_Country='$af_Country',
			p1_Model='$p1_Model',
			p2_Model='$p2_Model',
			p3_Model='$p3_Model',
			p4_Model='$p4_Model',
			p5_Model='$p5_Model',
			p6_Model='$p6_Model',
			p1_Number='$p1_Number',
			p2_Number='$p2_Number',
			p3_Number='$p3_Number',
			p4_Number='$p4_Number',
			p5_Number='$p5_Number',
			p6_Number='$p6_Number'
			where id = $af_id";
			$r3= mysqli_query($dbc,$q3);
			if ($r3)
				{echo '<br>airfield updated';}
			else
				{echo'<p>'.mysqli_error($dbc).'</p>';} 
				$q3="UPDATE airfields set 
				l3 = '$l3',
				l4 = '$l4',
				l5 = '$l5',
				l6 = '$l6',
				l7 = '$l7',
				l8 = '$l8',
				l9 = '$l9',
				l10 = '$l10',
				l11 = '$l11',
				l12 = '$l12',
				l13 = '$l13',
				l14 = '$l14',
				l15 = '$l15',
				l16 = '$l16',
				l17 = '$l17',
				l18 = '$l18',
				l19 = '$l19',
				l20 = '$l20',
				l21 = '$l21',
				l22 = '$l22',
				l23 = '$l23',				
				l24 = '$l24',
				l25 = '$l25',
				l26 = '$l26',
				l27 = '$l27',
				l28 = '$l28',
				l29 = '$l29',
				l20 = '$l30',
				l31 = '$l31',
				l32 = '$l32',
				l33 = '$l33',
				l34 = '$l34',
				l35 = '$l35',
				l36 = '$l36',
				l37 = '$l37',
				l38 = '$l38',
				l39 = '$l39',
				l40 = '$l40',
				l41 = '$l41',
				l42 = '$l42',
				l43 = '$l43',
				l44 = '$l44',
				l45 = '$l45',
				l46 = '$l46',
				l44 = '$l44'
				where id = $af_id";
			$r3= mysqli_query($dbc,$q3);
			if ($r3)
				{echo '<br>airfield updated';}
			else
				{echo'<p>'.mysqli_error($dbc).'</p>';} 




				
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
mysqli_close($dbc);
exit;
# to investigate mysqli_result, 