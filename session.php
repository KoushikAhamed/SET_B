<?php


$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="webtech";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

$sql = "select id from user where id='$user_check'" ;
$ses_sql=mysqli_query($conn, $sql );

$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['id'];
if(!isset($login_session)){
header('Location: login.php'); // Redirecting To Home Page
}
mysqli_close($conn);
?>