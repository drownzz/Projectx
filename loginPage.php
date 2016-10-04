<?php session_start(); ?>
<html>
    <head>
    	<?php 
        	if(isset($_SESSION["user_id"])){
        		echo '<link rel="stylesheet" type="text/css" href="userTheme.css">';
        	}else{
        		echo '<link rel="stylesheet" type="text/css" href="visitorTheme.css">';
        	}
		?>
        <title>This is login page</title>
        <link rel="icon" type="image/gif" href="img/webmonkey.gif" />
		<?php require'connectdb.php';?>
    </head>
    <body>
        <div id="login">
        <?php include'login.php';?>
        </div>
    </body>
</html>