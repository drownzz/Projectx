<?php
	include'phpFunctions.php';
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['login'])){
	        $password = $_POST['password'];
	        $username = $_POST['username'];
			$activated = TRUE;
	        
			
			$queryUsername = "SELECT * FROM Users WHERE name = '".$username."'";       
	        $resultUsername = mysqli_query($conn,$queryUsername);
			
	        if(mysqli_num_rows($resultUsername)<=0){
	        	if(empty($username)){
	        		echo "<p style='color: red;'> Username cannot be empty.</p>";
	        	}else{
					echo "<p style='color: red;'> Username is not registered, please register.</p>";
				}
			}else{
				$query = "SELECT * FROM users WHERE name = '$username' AND password = '".hash('sha256',($password))."'";
				$queryActivated = "SELECT * FROM users WHERE name = '$username' AND activated = '1'";
				if($result=mysqli_query($conn,$query)){
					if(mysqli_num_rows($result)==1){
						if($activated=mysqli_query($conn,$queryActivated)){
							if(mysqli_num_rows($activated)==1){					
								echo "Logged in succesfully";
								$_SESSION["user_id"] = $username;
								header('Refresh: 2; URL=index.php');
								exit;
							}else{
								echo "Your account has not yet been activated.";
							}
						}else{
							echo "The username and/or password are incorrect, please try again.";						
						}
					}
				}
			}
		}else if(isset($_POST['home'])){
	    	header("Location: index.php");
		}else{
	    	session_unset();
			session_destroy();
	    }
	}
?>
<form method="post">
    Username: <input type="text" name="username" /><br/>
    Password: <input type="password" name="password" /><br/>
<br/>
<input type="submit" name="login" value="Login" />
<input type="submit" name="logout" value="Logout" />
<input type="submit" name="home" value="Home" />

</form>