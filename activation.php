<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE>Activation page</TITLE>
      <?php require'connectdb.php';?>
   </HEAD>
   <BODY>
   </BODY>
</HTML>
<?php

	$activationKey = $_GET['activationKey'];
	$email = $_GET['email'];
	$query = "SELECT * FROM users WHERE email = '$email' AND activationKey = '$activationKey'";
	if($query){
		$sql = "UPDATE users SET activated='1' WHERE email='$email'";
		if(mysqli_query($conn, $sql)){
    		echo "Activated succesfully";
			header('Refresh: 2; URL=index.php');
		} else {
    	echo "Activation failed";
		}
	}
?>
