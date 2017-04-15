<?php

$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("ezwashing");
$strSQL = "INSERT INTO code ";
$strSQL .="(gencode,value) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["gencode"]."','".$_POST["value"]."') ";
$objQuery = mysql_query($strSQL);
if($objQuery){
	echo "<script type='text/javascript'>";
	echo "alert('Code Actived');";
echo "window.location = 'gencode.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error Try Again');";
	echo "</script>";
}
mysql_close($objConnect);
?>