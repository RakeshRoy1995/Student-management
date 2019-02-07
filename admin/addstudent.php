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
include ('title.php');

?>
<div class="addstudent">
<form method="post" action="addstudent.php" enctype="multipart/form-data">
	<table align="center" border="1">
		1.Roll NO
		<input type="text" name="roll" placeholder="Enter Roll No" required><br>
		2.Full Name
		<input type="text" name="name" placeholder="Enter Name" required><br>
		3.City
		<input type="text" name="city" placeholder="Enter City" required><br>
		4.Parents Contact no
		<input type="text" name="pcon" placeholder="Enter Parents Number" required><br>
		5.Standerd
        <input type="number" name="std" placeholder="Enter Standerd " required><br>
        6.Image
        <input type="file" name="image" required>
        <section style="color:black; background-color:grey;">
        <button type="submit" name="submit"> Submit </button>
        </section>
       	</table>

</form>
</div>       	
<?php

if(isset($_POST['submit'])){
include('../dbcon.php');

$roll=$_POST['roll'];
$name=$_POST['name'];
$city=$_POST['city'];
$pcon=$_POST['pcon'];
$std=$_POST['std'];
$imagename=$_FILES['image']['name'];
// var_dump('expression'); die();
$tempname=$_FILES['image']['tmp_name'];
move_uploaded_file($tempname, "../dataimg/$imagename");

$qry="INSERT INTO student (rollno, name, city, pcont, standerd, image) VALUES ($roll,'$name','$city','$pcon',$std,'$imagename')";
 // var_dump($qry); die();

$run=mysqli_query($con,$qry);

if($run==true){
	?>
	<script>
       alert("Inserted Successfully!!");
	</script>
	<?php
}

}



?>
<?php
include ('footer.php');
?>