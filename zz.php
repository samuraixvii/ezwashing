<?php

session_start();
  $HOST_NAME = "localhost";

  $DB_NAME = "ezwashing";
  $CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
  $USERNAME = "root";     // ตั้งค่าตามการใช้งานจริง
  $PASSWORD = "";  // ตั้งค่าตามการใช้งานจริง
  $coin =0;

 
  try {
  
    $db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
    // คำสั่ง SQL
    $sql = mysql_query ("SELECT * FROM ezwashing WHERE username = 'bobjones'");
while ($row = mysql_fetch_array ($sql)) 
  {
      $id = $row['id']; 
      $username = $row['username'];
      $title = $row['title'];
      $date = $row['date'];
      $category = $row['category'];
      $content = $row['content'];
}

   
  } catch (PDOException $e) {
  
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
  
  }
 
  
    ?>