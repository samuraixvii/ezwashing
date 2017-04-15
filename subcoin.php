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
		$sql = "SELECT username,password,coin,name
				FROM ezwashing where username = '{$_SESSION['abc']}'
				";
				
		// ใช้คำสั่ง prepare
		$ps = $db->prepare($sql);
		
		$ps->execute(array("username" == "'{$_SESSION['abc']}'"));
		$gold = $ps->fetch();

		/*$old = "SELECT coin from ezwashing where username = '{$_SESSION['abc']}'";*/
$coinall = $gold['coin']-2;
$result = "UPDATE ezwashing set coin = $coinall  where  username = '{$_SESSION['abc']}'"  ;
	
	
if ($db->query($result) == TRUE) {
  echo "<script type='text/javascript'>";
	echo "alert('Washing Machine Starting');";
	echo "window.location = 'washingmac2.php'; ";
	echo "</script>";
	
	
} else {
   echo $gold['coin']; 
}

		//echo print_r($result['coin'], true);

	} catch (PDOException $e) {
	
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
	
	}

?>