<?php
session_start();

if(isset($_SESSION['uid'])){
}
else{
	header('location: ../login.php');
}


?> 
<?php

include ('header.php');

?>

<div class="admintitle">
	<h3 align="right"><a href="logout.php" style="color:red;"> Logout </a></h3>
	<h1>Welcome to Admin Dashbord</h1>
</div>

<div class="dashbord">
	<table border="1">
	1.<a href="addstudent.php">Add Student </a><br>
	2.<a href="deletstudent.php">Delete Student </a><br>
	3.<a href="updatestudent.php">Update Student </a>
	</table>
</div>

<?php

include ('footer.php');

?>