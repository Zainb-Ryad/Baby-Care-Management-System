<?php session_start(); ?>
<?php include 'conf.php'; 
if(isset($_GET['logout'])){
unset($_SESSION['login']);
unset($_SESSION['type']);

}
if(isset($_POST['commit']))
{
   $res = $config -> query("select * from users where id='".$_POST['login']."' and pass='".$_POST['password']."'") or die($config -> error);
   $row = $res -> fetch_assoc();
   $rowsnum=$res -> num_rows;
   if($rowsnum>0)
   {
	   $_SESSION['login']='yes';
	   $_SESSION['id']=$row['id'];
	  
   }
   	
}
if(isset($_SESSION['login'])){
header('Location: index.php');
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Baby Care System</title>
  <link rel="icon" href="avatar31.jpg" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container" style="margin-top: 100px;">
    <div class="login">
      <img src="avatar31.jpg" class="avatar" style="width: 100px;height: 100px;border-radius: 50%;position: absolute;top: -50%;
       left: calc(50% - 50px);margin-top: 35px;">
       <h1>Login Here</h1>
      <form method="post" action="">
        <p><input type="text" name="login" value="" placeholder="UserId"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>
  </section>
</body>
</html>
