<?php  
$con=mysqli_connect("localhost","root","123123","db");  
 
mysqli_set_charset($con,"utf8");
  
if (mysqli_connect_errno($con))  
{  
   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql="SELECT * FROM users WHERE 'email'=$email";

if (empty($username) || empty($password) ||	empty($email)){
	echo 'You have to put all of them';
}else {
	if(!preg_match("/^[a-zA-Z0-9_\-]+@(([a-zA-Z_\-])+\.)+[a-zA-Z]{2,4}$/",$email)){
		echo 'failure';
	}else{
		$sql="SELECT * FROM users WHERE 'email'='$email'";
		$check = mysql_fetch_array(mysqli_query($con,$sql));
		
		if(isset($check)){
			echo 'email is already exist';
		}else {
			$result = mysqli_query($con,"insert into users (username,password,email) values ('$username','$password','$email')");
			
			if($result){
				echo 'success';
			}else {
				echo 'Connect is failure';
			}
		}
	}
}
mysqli_close($con);  
?> 
 
