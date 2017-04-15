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
    <title>EZ Washing</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ctrl-style.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/mqttws31.js"></script>
        <script type="text/javascript" src="assets/js/utils.js"></script>
        <script src="assets/vendor/highcharts/highstock.js"></script>
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
  <body onload="init();initMap();">
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
                    <a href="control.html">หน้าแรก</a>
                </li>
                <li>
                    <a href="credit.html">เติมเครดิต</a>
                </li>
                <li>
                    <a href="person.html">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="contact.html">ติดต่อเรา</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="contain">
        <div class="contain-padding">
        <div class="title">
            <div class="text-title">หอพักรักนะจุ๊บๆ</div>
            <div class="credit">
               <h1><?php echo $result['coin'] ?><span>COIN</span><p>จำนวนเหรียญของคุณ</p></h1>
            </div>
        </div>

        <div class="contain_content">
            <ul>
                <li>
                    <div class="washing">
                        
<!-- Washing 1 -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#E1EAF6;" d="M414.897,512H97.103c-9.751,0-17.655-7.904-17.655-17.655V17.655C79.448,7.904,87.352,0,97.103,0
    h317.793c9.751,0,17.655,7.904,17.655,17.655v476.69C432.552,504.096,424.648,512,414.897,512z"/>
<path style="fill:#D4DEED;" d="M432.552,88.276H79.448V17.655C79.448,7.904,87.352,0,97.103,0h317.793
    c9.751,0,17.655,7.904,17.655,17.655V88.276z"/>
<circle style="fill:#C4CFE3;" cx="256" cy="256" r="141.241"/>
<circle id="washing-1" style="fill:#54CE54;" cx="256" cy="256" r="114.759"/>
<circle style="fill:#444455;" cx="256" cy="256" r="97.103"/>
<circle style="fill:#5A5D6F;" cx="256" cy="256" r="61.793"/>
<text id="printf" x="50%" y="50%" text-anchor="middle"  style="fill:#fff;" dy=".3em">ว่าง</text>
  </g>
<path style="fill:#C4CFE3;" d="M185.379,88.276h-79.448c-4.875,0-8.828-3.953-8.828-8.828V26.483c0-4.875,3.953-8.828,8.828-8.828
    h79.448c4.875,0,8.828,3.953,8.828,8.828v52.966C194.207,84.323,190.254,88.276,185.379,88.276z"/>
<path style="fill:#D4DEED;" d="M397.241,485.517h-70.621c-4.875,0-8.828-3.953-8.828-8.828v-44.138c0-4.875,3.953-8.828,8.828-8.828
    h70.621c4.875,0,8.828,3.953,8.828,8.828v44.138C406.069,481.565,402.116,485.517,397.241,485.517z"/>
<path style="fill:#C4CFE3;" d="M379.586,291.31h-17.655c-9.751,0-17.655-7.904-17.655-17.655v-35.31
    c0-9.751,7.904-17.655,17.655-17.655h17.655V291.31z"/>
<path style="fill:#ABB9D3;" d="M167.724,70.621h-44.138c-4.875,0-8.828,3.953-8.828,8.828v8.828h61.793v-8.828
    C176.552,74.573,172.599,70.621,167.724,70.621z"/>
<circle style="fill:#929CB4;" cx="256" cy="44.138" r="26.483"/>
<g>
    <path style="fill:#C4CFE3;" d="M317.793,61.793L317.793,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C326.621,57.841,322.668,61.793,317.793,61.793z"/>
    <path style="fill:#C4CFE3;" d="M344.276,61.793L344.276,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C353.103,57.841,349.151,61.793,344.276,61.793z"/>
    <path style="fill:#C4CFE3;" d="M370.759,61.793L370.759,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C379.586,57.841,375.634,61.793,370.759,61.793z"/>
    <path style="fill:#C4CFE3;" d="M397.241,61.793L397.241,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C406.069,57.841,402.116,61.793,397.241,61.793z"/>
    </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
<div class="button_start">
                        <a href="washingmac.html">ใช้งาน</a>
                    </div>

                    </div>
                </li>
                <li>
                     <div class="washing">
                        
<!-- Washing 1 -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#E1EAF6;" d="M414.897,512H97.103c-9.751,0-17.655-7.904-17.655-17.655V17.655C79.448,7.904,87.352,0,97.103,0
    h317.793c9.751,0,17.655,7.904,17.655,17.655v476.69C432.552,504.096,424.648,512,414.897,512z"/>
<path style="fill:#D4DEED;" d="M432.552,88.276H79.448V17.655C79.448,7.904,87.352,0,97.103,0h317.793
    c9.751,0,17.655,7.904,17.655,17.655V88.276z"/>
<circle style="fill:#C4CFE3;" cx="256" cy="256" r="141.241"/>

<circle id="washing-2" style="fill:#54CE54;" cx="256" cy="256" r="114.759"/>

<circle style="fill:#444455;" cx="256" cy="256" r="97.103"/>
<circle id="animation_countdown" class="washing-2" style="fill:#5A5D6F;" cx="256" cy="256" r="61.793"/>
<text id="printf" x="50%" y="50%" text-anchor="middle"  style="fill:#fff;" dy=".3em">ว่าง</text>

<path style="fill:#C4CFE3;" d="M185.379,88.276h-79.448c-4.875,0-8.828-3.953-8.828-8.828V26.483c0-4.875,3.953-8.828,8.828-8.828
    h79.448c4.875,0,8.828,3.953,8.828,8.828v52.966C194.207,84.323,190.254,88.276,185.379,88.276z"/>
<path style="fill:#D4DEED;" d="M397.241,485.517h-70.621c-4.875,0-8.828-3.953-8.828-8.828v-44.138c0-4.875,3.953-8.828,8.828-8.828
    h70.621c4.875,0,8.828,3.953,8.828,8.828v44.138C406.069,481.565,402.116,485.517,397.241,485.517z"/>
<path style="fill:#C4CFE3;" d="M379.586,291.31h-17.655c-9.751,0-17.655-7.904-17.655-17.655v-35.31
    c0-9.751,7.904-17.655,17.655-17.655h17.655V291.31z"/>
<path style="fill:#ABB9D3;" d="M167.724,70.621h-44.138c-4.875,0-8.828,3.953-8.828,8.828v8.828h61.793v-8.828
    C176.552,74.573,172.599,70.621,167.724,70.621z"/>
<circle style="fill:#929CB4;" cx="256" cy="44.138" r="26.483"/>
<g>
    <path style="fill:#C4CFE3;" d="M317.793,61.793L317.793,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C326.621,57.841,322.668,61.793,317.793,61.793z"/>
    <path style="fill:#C4CFE3;" d="M344.276,61.793L344.276,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C353.103,57.841,349.151,61.793,344.276,61.793z"/>
    <path style="fill:#C4CFE3;" d="M370.759,61.793L370.759,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C379.586,57.841,375.634,61.793,370.759,61.793z"/>
    <path style="fill:#C4CFE3;" d="M397.241,61.793L397.241,61.793c-4.875,0-8.828-3.953-8.828-8.828V35.31
        c0-4.875,3.953-8.828,8.828-8.828l0,0c4.875,0,8.828,3.953,8.828,8.828v17.655C406.069,57.841,402.116,61.793,397.241,61.793z"/>
    </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
<div class="button_start">
                        <a href="washingmac2.html">ใช้งาน</a>
                    </div>
                    </div>

                </li>
            </ul>
        </div>

        </div>
        <footer id="printf2">
            Copyright © 2017 by EZwashing
        </footer>
    </div>

       <div id="printf"></div>
        <script type="text/javascript" src="js/app.js"> </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>