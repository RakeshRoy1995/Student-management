<?php
session_start();

if(isset($_SESSION['uid'])){
	header('location:admin/admindash.php');
}

?>

<!DOCTYPE HTML>
<html lang="en_US">
<head>
	<meta charset="UFT-8">
	<title>Admin login	</title>
</head>
<body>
	<h1 align="center">Admin login</h1>
	<form action="login.php" method="post" style="width:100%;" align="center">
	<input type="text" name="uname" placeholder="username" required><br>
	<input type="password" name="pass" placeholder="password" required><br>
	<input type="submit" name="login" value="login" align="right">		
	</form>
</body>
</html>

<?php

include ('dbcon.php');

if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$password=$_POST['pass'];

	$qry="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);

	if($row<1)
	{
        ?>
		<script>
		alert("Wrong password or username");
		window.open('login.php','_self');
		</script>
		<?php
	}

else{
	$data=mysqli_fetch_assoc($run);
	$id=$data['id'];

	$_SESSION['uid']=$id;
	header("location:admin/admindash.php");
  }
	
      }

?>