<?php

include('../dbcon.php');

$roll=$_POST['roll'];
$name=$_POST['name'];
$city=$_POST['city'];
$pcon=$_POST['pcon'];
$standerd=$_POST['standerd'];
$id=$_POST['sid'];
$imagename=$_FILES['image']['name'];
// var_dump('expression'); die();
$tempname=$_FILES['image']['tmp_name'];
move_uploaded_file($tempname, "../dataimg/$imagename");

$qry="UPDATE student SET rollno = $roll, name = '$name', city = '$city', pcont ='$pcon', standerd=$standerd, image='$image' WHERE id = '$id'";


$run=mysqli_query($con,$qry);

if($run==true){
	?>
	<script>
       alert("Updated Successfully!!");
       window.open('updateform.php?sid=<?php echo $id;?>','_self');
  	</script>
	<?php
}

?>