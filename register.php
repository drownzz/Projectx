<?php
	include'phpFunctions.php';
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['register'])){
	        $password = $_POST['password'];
	        $username = $_POST['username'];
			$email = $_POST['email'];
			$activateKey = activationKey();
			$saltPassword = hash('sha256',($password));
			$stmt = $conn->prepare("INSERT INTO users (name, password, email, activationKey) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $username, $saltPassword, $email, $activateKey);
			
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
					$stmt->execute();
					$to = "$email";
					$sub = "Activation Dave's test website";
					$msg = "This is your activation link http://82.73.183.34/project/projectx/activation.php?activationKey={$activateKey}&email={$email}"; 

					mail($to, $sub, $msg);	
					echo "<p style='color: red;'> Succesfull registered, an email has been send, activate your account. </p>";
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