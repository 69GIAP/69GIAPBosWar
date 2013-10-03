<?php
{$colname =$_POST['colname'];}
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $colname))
	{echo "One or more special characters found in the column name<br>";}
else
	{echo "no special characters found in name <br>";}
if (!empty($colname))
	{echo "Column name $colname accepted <br>";}
else
	{echo "You must have a valid name for the column <br>";}
$vector = $_POST['vector'];
if ($vector <0 OR $vector >360)
{echo "Vector must be between 0-360° <br>";}




# $vehicle_1 = $_POST['vehicle_1'];
# $vehicle_1 = $_POST['vehicle_1'];
