
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("ezwashing");
$strSQL = "INSERT INTO ezwashing ";
$strSQL .="(username,room,password,coin,name) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["username"]."','".$_POST["room"]."','".$_POST["password"]."','".$_POST["coin"]."','".$_POST["name"]."') ";
$objQuery = mysql_query($strSQL);
if($objQuery){
	echo "<script type='text/javascript'>";
	echo "alert('Register Successful');";
	echo "window.location = 'index.html'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Someting Wrong Plese Try Agian');";
	echo "</script>";
}
mysql_close($objConnect);
?>
