<?php
session_start();

 
        $HOST_NAME = "localhost";

    $DB_NAME = "ezwashing";
    $CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
    $USERNAME = "root";     // ตั้งค่าตามการใช้งานจริง
    $PASSWORD = "";  // ตั้งค่าตามการใช้งานจริง
    $coin =0;
    $coinall = 0;

 
    try {
    
        $db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
        // คำสั่ง SQL
        $sql = "SELECT username,coin
                FROM ezwashing where username ='{$_SESSION['abc']}'
                ";
                
        // ใช้คำสั่ง prepare
        $ps = $db->prepare($sql);
        
        $ps->execute(array( "username" == "'{$_SESSION['abc']}'"));
        $codeval = $ps->fetch();
$coin =$codeval['coin'];
    
    } catch (PDOException $e) {
    
        echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
    
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EZ Washing</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ctrl-style.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/mqttws31.js"></script>
        <script type="text/javascript" src="assets/js/utils.js"></script>
        <script src="assets/vendor/highcharts/highstock.js"></script>
  <script type="text/javascript" src="assets/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/mqttws31.js"></script>
  <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/vendor/nouislider/nouislider.min.js"></script>
  <script type="text/javascript" src="assets/vendor/snackbarjs/snackbar.min.js"></script>
  <script type="text/javascript" src="assets/vendor/bootstrap-material-design/js/material.min.js"></script>
  <script type="text/javascript" src="assets/vendor/bootstrap-material-design/js/ripples.min.js"></script>
  <script type="text/javascript" src="assets/js/utils.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr:300,400,500|Montserrat:100,300,400,500,700,900" rel="stylesheet">
  </head>
  <body>
    <div class="side-bar">
        <div class="user-zone">
            <ul>
                <li>
                    <img class="user-img" src="images/profile.jpg" alt="">
                    <div class="user-name">
                        <h3><?php echo $_SESSION['abc'] ?></h3>
                        <p>administrator</p>
                    </div>
                </li>
                <li>
                    <a href="control.php">หน้าแรก</a>
                </li>
                <li>
                    <a href="credit.php">เติมเครดิต</a>
                </li>
                <li>
                    <a href="person.php">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="contact.php">ติดต่อเรา</a>
                </li>
                <li>
                    <a href="contact.php">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="contain">
        <div class="contain-padding">
        <div class="title">
            <div class="text-title">Credit</div>
            <div class="credit">
               <h1><?php echo $coin ?><span>COIN</span><p>จำนวนเหรียญของคุณ</p></h1>
            </div>
        </div>
        <div class="contain_content_credit">
            <h5>เหรียญทั้งหมดของคุณ</h5>
            <h1><?php echo $coin ?></h1>
            <p>coin</p>
            <form action="addcoin.php" method="POST">
            <input type="text" class="form-control" placeholder="กรอกรหัส" name="gencode">
            <input type="hidden" value="<? echo $_SESSION['abc'] ?>">
            <br>
            <button type="submit" class="button-credit">เติมเหรียญ</button></form>
            <br>
            <br>
            <br>
            <p style="font-size: 12pt; color: #848484;">* 10 บาทมีค่าเท่ากับ 1 coin</p>
        </div>


        <footer id="printf2">
            Copyright © 2017 by EZwashing
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>