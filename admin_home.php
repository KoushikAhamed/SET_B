<?php
session_start();
if(!isset($_SESSION['login_user']) )
{ header("location: login.php");
 }
?>
<center>
	<h1>Welcome <?php
	$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="setb";		
$id=$_SESSION['login_user'];
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "select name from user where id='$id'" ;
	
	$result=mysqli_query($conn, $sql );	
	$arr=mysqli_fetch_assoc($result);
	echo $arr['name'];
	mysqli_close($conn);
	?></h1>
	<a href="profile.php">Profile</a>
	<br/>
	<a href="change_password.php">Change Password</a>
	<br/>
	<a href="view_users.php">View Users</a>
	<br/>
	<a href="login.php">Logout</a>
</center>
