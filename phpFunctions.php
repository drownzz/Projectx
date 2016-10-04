<?php

	//Password check
        function checkPassword($password){
	        if(empty($password)){
	            echo "<p style='color: red;'>Password is required.</p>";
				return false;
	        }else if(strlen($password) < 6){
	            echo "<p style='color: red;'> The password must contain atleast 6 characters.</p>";
				return false;
	        }
			return true;
		}
		
		//Email check
		function checkEmail($email){
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			echo "<p style='color: red;'> Invalid email. </p>"; 
				return false;
    		}
			return true;
		}
		
		function checkUsername($username){
	        if(empty($username)){
	            echo "<p style='color: red;'>Username is required.</p>";
				return false;
	        }else{
	            if(strlen($username) < 4){
	             echo "<p style='color: red;'> The username must contain atleast 4 characters.</p>";
				return false;
	            }
	        }
			return true;
		}
		
		function activationKey(){
			$characters = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
			$randstring = '';
			for ($i = 0; $i < 15; $i++) {
        		$randstring .= $characters[rand(0, count($characters)-1)];
			}
			return $randstring;
}

?>