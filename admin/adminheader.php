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