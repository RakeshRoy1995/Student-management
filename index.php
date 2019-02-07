<?php

include ('header.php');          

?>
	<h3 align="right"><a href="login.php">Admin Login</a></h3>
	<h1 align="center" > Welcome to Student Management System</h1>

	<form method="post" action="index.php" style="">
		<table style="width:30%;" align="centre" border="1">
			<tr>
               <td colspan="2" align="center">Student Information </td>
			</tr>
			<tr>
               <td align="left"> Choose Class </td>
               <td>
                  <select name="std">
                  	<option value="1">1st</option>
                  	<option value="2">2nd</option>
                  	<option value="3">3rd</option>
                  	<option value="4">4th</option>
                  	<option value="5">5th</option>
                  	<option value="6">6th</option>
                  </select>
               </td>	
               </tr>		
			<tr>
               <td align="left"> Enter Rollno </td>
               <td> <input type="text" name="rollno" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <input type="submit" name="submit" value="Show Info"> </td>
			</tr>			
		</table>
	</from>
   
   <center>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
  <!-- <b>Serach Result</b> -->
<tr>
  <th><strong>Name</strong></th>
  <th><strong>Class</strong></th>
  <th><strong>Roll No</strong></th>
  <th><strong>City</strong></th>
  <th><strong>Parent Number</strong></th>
  <th><strong>picture</strong></th>
</tr>
</thead>
<tbody>

  <?php
require('dbcon.php');
if (isset($_POST['submit'])) {
  $rollno = $_POST['rollno'];
  $std = $_POST['std'];

  $sel_query = "SELECT * from student where rollno = $rollno AND standerd = $std";
    $result = mysqli_query($con,$sel_query);

$count=1;
while($row = mysqli_fetch_assoc($result)) { ?>
  <td align="center"><?php echo $row["name"]; ?></td>
  <td align="center"><?php echo $row["standerd"]; ?></td>
  <td align="center"><?php echo $row["rollno"]; ?></td>
  <td align="center"><?php echo $row["city"]; ?></td>
  <td align="center"><?php echo $row["pcont"]; ?></td>
  <td align="center"><img style="width:70px; height:70px;" src="dataimg/<?php echo $row["image"]; ?>"> </td>
</tr>
<?php

}
 }?>
</tbody>
</table>

</center>



<?php

include ('footer.php'); 

?>