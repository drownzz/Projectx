<?php
	include'phpFunctions.php';
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['register'])){
	        $password = $_POST['password'];
	        $username = $_POST['username'];
			$email = $_POST['email'];
			
			if(checkUsername($username) && checkPassword($password) && checkEmail($email)){
				$queryUsername = "SELECT * FROM Users WHERE name = '".$username."'";
				$queryEmail = "SELECT * FROM Users WHERE email = '".$email."'";
				$usernameExists = false;
				$emailExists = false;
		        
		        $resultUsername = mysqli_query($conn,$queryUsername);
				$resultEmail = mysqli_query($conn,$queryEmail);
				
		        if(mysqli_num_rows($resultUsername)>=1){
		        	$usernameExists = true;
					echo "<p style='color: red;'> Username already exists, please choose another one.</p>";
				}
				if(mysqli_num_rows($resultEmail)>= 1){
					$emailExists = true;
					echo "<p style='color: red;'> Email already exists, please choose another one.</p>";
				}        
				
				if((!$emailExists) & (!$usernameExists)){
					$activateKey = activationKey();
					$sql = "INSERT INTO Users (name, password, email, activationKey)
					VALUES ('$username', '".hash('sha256',($password))."', '$email', '$activateKey')";
					if ($conn->query($sql) === TRUE){
						
						$to = "$email";
						$sub = "Activation Dave's test website";
						$msg = "This is your activation link http://82.73.183.34/project/projectx/activation.php?activationKey={$activateKey}&email={$email}"; 

						mail($to, $sub, $msg);	
						echo "<p style='color: red;'> Succesfull registered, an email has been send, activate your account. </p>";
		        	}else{
		          		echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}			
			}
		}else{
			if(isset($_SESSION["user_id"])){
				session_unset();
				session_destroy();
			}else{
				header("Location: loginPage.php");
			}
		}
	}
?>
<form action="" method="post">
    Username: <input type="text" name="username" /><br/>
    Email: <input type="email" name="email" /><br/>
<br/>
    Password: <input type="password" name="password" /><br/>
<br/>
<input type="submit" name="register"value="Register" />
<?php 
	if(isset($_SESSION["user_id"])){
		echo '<input type="submit" name="logout" value="Logout" />';
	}else{
		echo '<input type="submit" name="login" value="Login" />';
	}
?>
</form>