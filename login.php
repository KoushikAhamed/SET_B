<?php
session_start();
error_reporting(0);
if(isset($_SESSION['login_user'])) 
{
	$id=$_SESSION['login_user'];
	
	$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="setb";
	
	
	$id 	=$_POST['id'];
	$pass	=$_POST['pass'];
	
	$conn2 = mysqli_connect($servername, $username, $password, $dbname);
	
	if(!$conn2){
		die("Connection Error!".mysqli_connect_error());
	}
	$sql = "select user_type from user where id='$id'" ;
	
	$result1=mysqli_query($conn2, $sql );	
	
    $arr=mysqli_fetch_assoc($result1);
	
	if($arr2['user_type']=="admin" ){
	header("location: admin_home.php");

	}
else
{
 header("location: user_home.php");
}
mysqli_close($conn2);
 }


 if(isset($_POST['submit'])){
    $id=$_POST['id'];
	$pass=$_POST['pass'];
	$servername = "localhost";
    $username = "root";
    $password = "";
	$database="setb";
	$conn = mysqli_connect($servername, $username, $password,$database);

$sql = "select id from user where pass='$pass' and id='$id'" ;
	
	$result1=mysqli_query($conn, $sql );	
	
    $arr=mysqli_fetch_assoc($result1);

    $sql2 = "select type from user where pass='$pass' and id='$id'" ;
	
	$result2=mysqli_query($conn, $sql2 );	
	
    $arr2=mysqli_fetch_assoc($result2);
   
   
	
	if( $id == $arr['id'] && $arr2['type']=="admin" )	
	{
		$_SESSION['login_user']=$id;
		header("location: admin_home.php");
	}
	
	else if( $id == $arr['id'] && $arr2['user_type']=="user" )	
	{
		$_SESSION['login_user']=$id;
		header("location: user_home.php");
	}
	else
	{
		echo "wrong password";
	}
	mysqli_close($conn);
	
 
}
?>

<center>
<form action="#" method="POST">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<fieldset>
					<legend><h3>LOGIN</h3></legend>
					User Id<br/>
					<input type="text" name="id" value="" ><br/>                               
					Password<br/>
					<input type="password" name="pass" value="" >
					<br /><hr/>
					<input type="button" name="submit" value="Login">
					<a href="registration.php">Register</a>
				</fieldset>
			</td>
		</tr>                                
	</table>
</form>
</center>
