<?php
session_start();
// store session data
$_SESSION['loged_in']=0;

if (isset($_POST['username'])){ //If it is the first time, it does nothing   
	if ($_POST['username'] == 'login' && $_POST['password'] == 'password'){
		$_SESSION['loged_in']=1;
		 
		
	}
	header('Location: admin.php');
	exit; 

}

?>
<html>
<h1>login</h1>
<p>
<form method="post" action="login.php">
		Username <input type="text" size="10" maxlength="10" name="username"> <br />
		Password<input type="text" size="10" maxlength="10" name="password"></br>
		<input type="submit" />
	</p>
</html>

