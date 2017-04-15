<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>EZ Washing</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Mitr:300,400,500|Montserrat:100,300,400,500,700,900" rel="stylesheet"> </head>

<body>
<?php

$rand = "CEZWASHING".rand(1000,9999).rand(1000,9999);

?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="log-in logo"> <img src="images/logo.svg" alt=""> </div>
      </div>
      <div class="log-in form">
        <form class="form-horizontal" action="codeadd.php" method="post"> <br> <br> <br> <br> <br> 
        <div class="form-group"> <label for="sel1">เลือกราคา</label><br> <select class="form-controls" id="sel1" name="value">
                            <option name="value" value= "2">20 coin</option>
                            <option name="value" value= "5">50 coin</option>
                            <option name="value" value= "10">100 coin</option>
                            <option name="value" value= "20">200 coin</option>
                        </select> </div>
                        <input type="hidden" name="gencode" value="<?=$rand?>">
        <div class="col-md-12"><?php echo($rand."<br>"); ?> </div> <button type="submit" class="button">รับโค้ด</button></div>
    </div>
  </div></form>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>