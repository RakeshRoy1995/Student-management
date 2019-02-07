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

?>

<table align="center">
	<form action="updatestudent.php" method="post">
		<tr>
			<th>Enter Standerd</th>
			<td><input type="number" name="standerd" placeholde="Enter Standerd" required></td>
			<th>Enter name </th>
			<td><input type="text" name="stuname" placeholde="Enter Name" required></td>

			<td colspan="2"><input type="submit" name="submit" value="Search"></td>			
		</tr>
	</form>
</table>

<!-- <form action="updatestudent.php" method="post" align="center" >
	1.<input type="number" name="standerd" placeholder="Enter Standerd">
	2.<input type="name" name="stuname"  placeholder="Enter name">
	<input type="submit" name ="submit" value="Search">
</form> -->

<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr style="background-color:#000; color:#fff;  ">
		<th>NO</th>
		<th>Image</th>
		<th>Name</th>
		<th>RollNO</th>
		<th>edit</th>
	</tr>
	<?php 
      if(isset($_POST['submit'])){
      	include ('../dbcon.php');
        $standerd = $_POST['standerd'];
        $name= $_POST['stuname'];
        $sql="SELECT * FROM student WHERE standerd=$standerd AND name LIKE '%$name%'";
        $run=mysqli_query($con, $sql);
        if(mysqli_num_rows($run)<1){
        	echo "<tr><td colspan='5'> No records found </td></tr>";
        }
        else {
                $count=0;
                while ($data=mysqli_fetch_assoc($run)) {
                	$count++;
                	?>
       	<tr align="center">
			<td> <?php echo $count; ?> </td>
			<td> <img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;" /></td>
			<td> <?php echo $data['name'];?> </td>
			<td> <?php echo $data['rollno'];?> </td>
			<td> <a href="updateform.php?sid=<?php echo $data['id'];?>">Edit </a> </td>
		</tr>
		<?php
           }
        }
      }

		?>
</table>

