<?php
 session_start();
 header ('Content-type: text/html; charset=utf-8');
 
 mysql_connect("localhost","root","");  //ข้อมูลนี้ได้มาจากตอนติดตั้งเว็บเซิร์ฟเวอร์
 mysql_select_db("ezwashing");
 
 $username = isset($_POST['username']) ? $_POST['username'] : '';
 $password = isset($_POST['password']) ? $_POST['password'] : '';
 $_SESSION['abc']=$_POST['username'];
 
 $strSQL = "SELECT * FROM ezwashing WHERE username = '".mysql_real_escape_string($username)."' 
 AND password = '".mysql_real_escape_string($password)."'";
 $qry = mysql_query($strSQL) or die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้ Error : '. mysql_error());
 $row = mysql_fetch_assoc($qry);
 if(!$row)
 {
   echo "<script type='text/javascript'>";
	echo "alert('ชื่หรือรหัสผ่านไม่ถูกต้อง ลองอีกครั้ง');";
	echo "window.location = 'index.html'; ";
	echo "</script>";
 }
 else
 {
   //สร้าง SESSION เพื่อใช้ในหน้าอื่น ที่ต้องการตรวจสอบข้อมูลผู้ใช้ในขณะนั้น
 	?><input type="hidden" value="<? echo $_SESSION['123'] ?>"><?php
  echo "<script type='text/javascript'>";
	echo "alert('Log in Successful');";
	echo "window.location = 'control.php'; ";
	echo "</script>";

   


 }
 mysql_close();//ปิดการเชื่อมต่อฐานข้อมูล
?>