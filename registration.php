<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 if(isset($_POST['submit'])){
    $id=$_POST['id'];
	$pass=$_POST['pass'];
	$passcon=$_POST['passcon'];
	$name=$_POST['name'];
	$typeofuser=$_POST['typeofuser'];
	$servername = "localhost";
    $username = "root";
    $password = "";
	$database="setb";
$conn = mysqli_connect($servername, $username, $password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `user`(`id`, `pass`, `passcon`, `name`, `type`) VALUES('$id','$pass','$passcon','$name','$typeofuser')";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);	
 }
}
?>
<center>
<form action="#" method="POST">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<fieldset>
					<legend><h3>REGISTRATION</h3></legend>
					Id<br/><input type="text" name="id" value=""><br/>
					Password<br/><input type="password" name="pass" value=""><br/>
					Confirm Password<br/><input type="password" name="passcon" value=""><br/>
					Name<br/><input type="text" name="name" value=""><br/>
					User Type<hr/>
					<input type="radio" name="typeofuser" value="user" />User
					<input type="radio" name="typeofuser" value="admin"/>Admin
					<hr/>
					<input type="submit" name="submit" value="Sign Up">
					<a href="login.html">Sign In</a>
				</fieldset>
			</td>
		</tr>                                
	</table>
</form>
</center>
		
