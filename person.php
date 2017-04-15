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
        // คำสั่ง SQL
        $sql = "SELECT username,password,coin
                FROM ezwashing
                ";
                
        // ใช้คำสั่ง prepare
        $ps = $db->prepare($sql);
        
        $ps->execute(array("username" == $_SESSION['abc']));
        $result = $ps->fetch();
    $addcoin =$result['coin'] ;
    
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
    <title>Bootstrap 101 Template</title>

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
            </ul>
        </div>
    </div>
    <div class="contain">
        <div class="contain-padding">
        <div class="title">
            <div class="text-title">ข้อมูลส่วนตัว</div>
            <div class="credit">
               <h1><?php echo $result['coin'] ?><span>COIN</span><p>จำนวนเหรียญของคุณ</p></h1>
            </div>
        </div>
        <div class="contain_content_person">
            <input type="text" class="form-control-person" value="Namw Lastname">
            <br>
            <input type="text" class="form-control-person" value="207">
            <br>
            <input type="text" class="form-control-person" value="username">
            <br>
            <input type="password" class="form-control-person" value="New password">
            <br>
            <input type="password" class="form-control-person" value="Confirm password">
            <br>
            <br>
            <button type="submit" class="button-credit">ตกลง</button>
            <br>
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