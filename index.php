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
        <title>Test website</title>
        <link rel="icon" type="image/gif" href="img/webmonkey.gif" />
		<?php require'connectdb.php';?>
    </head>
    <body>
        <div id="login">
        <?php include'register.php';?>
        </div>
		
		<?php 
        	if(isset($_SESSION["user_id"])){
        		echo "<col> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare a nibh at placerat. Etiam sagittis ipsum eget magna egestas tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat ultrices erat, ac ultrices ante tristique nec. Maecenas lacus est, venenatis fringilla tristique at, accumsan sit amet nunc. Nulla hendrerit justo ac ante ornare pharetra. Praesent elit tortor, mattis non lacus et, pulvinar bibendum ipsum. Quisque id orci a tellus condimentum dapibus sit amet at nisl. Quisque sit amet erat nec erat venenatis dictum. Aliquam erat volutpat. Maecenas finibus massa blandit est euismod mattis. Suspendisse imperdiet sem est, id feugiat diam fringilla ut. Mauris blandit felis lectus, ac semper magna posuere in. Curabitur ullamcorper id ligula sit amet lacinia. Aliquam suscipit leo vitae metus auctor vulputate. Nam ac aliquet urna.

Nam tellus mauris, posuere vitae dignissim sed, feugiat eget lacus. Donec tristique eu magna ac laoreet. Vestibulum aliquet tristique lectus, ut dignissim tortor vestibulum nec. Cras faucibus aliquam turpis ut tristique. Suspendisse quis nibh eget orci pretium pretium pellentesque vitae urna. Morbi non porta velit. Suspendisse potenti. Integer scelerisque, massa vulputate aliquam suscipit, enim ligula dignissim lectus, sagittis venenatis nisi lorem scelerisque massa. Etiam imperdiet turpis massa, vel scelerisque magna porttitor quis. Praesent gravida vehicula facilisis. Sed placerat faucibus mollis. Cras accumsan pretium massa, a ultrices erat aliquam quis. Nam vulputate sapien ac sagittis fermentum. Donec orci mi, vulputate ut quam et, mollis tincidunt erat.</p>";
        	}
        ?>
    </body>
</html>