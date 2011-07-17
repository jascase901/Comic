<?php
session_start();
// store session data

?>
<html>

	<title>
		Admin Page
	</title>
		
	<body>
	<?php if ($_SESSION['loged_in']==1) {?>
	<head>
			<h1>Admin</h1>
		</head>
	
	<h3>Add</h3>
	<form method="post" action="add.php">
		Title <input type="text" size="10" maxlength="40" name="title"> <br />
		Url <input type="text" size="10" maxlength="250" name="url"></br>
		Author <input type="text" size="10" maxlength="50" name="author"></br>
		<input type="submit" />

	</form>
	<?php } 
	else{ 
		?>
		<h1> Login Failed</h1>
		<p><a href="login.php">back</a><br />
	<?php }?>
		
	</body>
</html>

                                    
