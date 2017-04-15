<?php
 session_start();
    $HOST_NAME = "localhost";
    $DB_NAME = "ezwashing";
    $CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
    $USERNAME = "root";     // ตั้งค่าตามการใช้งานจริง
    $PASSWORD = "";  // ตั้งค่าตามการใช้งานจริง
    $addcoin2 =0;
 
    try {
    
        $db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
        // คำสั่ง SQL
        $sql = "SELECT coin,username
                FROM ezwashing
                ";
                
        // ใช้คำสั่ง prepare
        $ps = $db->prepare($sql);
        
        $ps->execute(array("username" == $_SESSION['abc']));
        $result = $ps->fetch();
    $addcoin2 =$result['coin'] + $addcoin ;

$result['coin'] = "UPDATE ezwashing set coin = $addcoin2";
    
    if ($db->query($result['coin']) == TRUE) {
  echo "<script type='text/javascript'>";
    echo "alert('Add');";
    echo "window.location = 'credit.php'; ";
    echo "</script>";
    


} else {
    
}

        //echo print_r($result['coin'], true);
        
    
    } catch (PDOException $e) {
    
        echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
    
    }
 
?>