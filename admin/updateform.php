<?php
session_start();
if(isset($_SESSION['uid'])){
	echo "";
}
else {
	header('location:../login.php');
}

?>

<?php
include ('header.php');
include ('title.php');
include ('../dbcon.php');

$sid = $_GET['sid'];
$sql="SELECT * FROM student WHERE id='$sid'";
$run=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($run);

?>

<div class="addstudent">
<form method="post" action="updatedata.php" enctype="multipart/form-data">
	<table align="center" border="1">
		1.Roll NO
		<input type="text" name="roll" value=<?php echo $data['rollno']; ?> required /><br>
		2.Full Name
		<input type="text" name="name" value=<?php echo $data['name']; ?> required /><br>
		3.City
		<input type="text" name="city" value=<?php echo $data['city']; ?> required /><br>
		4.Parents Contact no
		<input type="text" name="pcon" value=<?php echo $data['pcont']; ?> required /><br>
		5.Standerd
        <input type="number" name="standerd" value=<?php echo $data['standerd']; ?> required /> <br>
        6.Image
        <input type="file" name="image" required>
        <section style="color:black; background-color:grey;">
        <input type="hidden" name="sid" value=<?php $data['id']; ?> >	
        <button type="submit" name="submit"> Submit </button>
        </section>
       	</table>

</form>
</div>  