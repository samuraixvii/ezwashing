<?php
session_start();
$HOST_NAME = "localhost";
	$DB_NAME = "ezwashing";
	$CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
	$USERNAME = "root";     // ตั้งค่าตามการใช้งานจริง
	$PASSWORD = "";  // ตั้งค่าตามการใช้งานจริง
	$addcoin =0;
 
	try {
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
		$sql = "SELECT username,password,room,name
				FROM ezwashing where username = '{$_SESSION['abc']}'
				";
				
		// ใช้คำสั่ง prepare
		$ps = $db->prepare($sql);
		
		$ps->execute(array("username" == "'{$_SESSION['abc']}'"));
		$prof = $ps->fetch();

		/*$old = "SELECT coin from ezwashing where username = '{$_SESSION['abc']}'";*/


$result2 = "UPDATE ezwashing set password = '{$_POST['password']}'  where  username = '{$_SESSION['abc']}'"  ;
$result3 = "UPDATE ezwashing set name = '{$_POST['name']}'  where  username = '{$_SESSION['abc']}'"  ;
$result4 = "UPDATE ezwashing set room = '{$_POST['room']}'  where  username = '{$_SESSION['abc']}'"  ;
	/*$db->query($result1);
	$db->query($result2);
	$db->query($result3);
	$db->query($result4);*/
	
if ($db->query($result2) and $db->query($result3) and $db->query($result4))== TRUE) {


  echo "<script type='text/javascript'>";
	echo "alert('Update');";
	echo "window.location = 'credit.php'; ";
	echo "</script>";
	
	
} else {

}

		//echo print_r($result['coin'], true);

	} catch (PDOException $e) {
	
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
	
	}

?>