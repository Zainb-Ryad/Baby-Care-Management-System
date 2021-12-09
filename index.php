<?php session_start();

if(!isset($_SESSION['login'])){
header('Location: adminlog.php');}
include 'conf.php';

$res=$config -> query("select * from users where id='".$_SESSION['id']."'") or die($config -> error);
$row_login= $res -> fetch_assoc();
$_SESSION['type']=$row_login['type'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php echo $row_login['name'];?></title>
<link rel="icon" href="avatar31.jpg" type="image/x-icon">
</head>
<body><br />
<br />

<div class="login" style="width:1020px; height:100%;overflow:scroll-y;"  >
      <h1>Welcome <?php echo $row_login['name'];?></h1>

<?php if($row_login['type']=="admin"){
	  
	include 'admin.php';
	} else if($row_login['type']=="doctor"){
		include 'doctor.php';
}else{
	include 'mother.php';
}?>
    </div>

<a href="adminlog.php?logout">logout</a>
</body>
</html>