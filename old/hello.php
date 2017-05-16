<!DOCTYPE html>
<html>
<head>
	<title><?php  echo "hello world"; ?></title>
</head>
<body>
<?php
if (isset($_POST['submit'])){
	printf('User Name %s
	<br>Password:%s',
	$_POST['name'],$_POST['password']);
}
?>
	<p><?php  echo "hello world"; ?></p>
	<form method="post" action="">

	
name :<input type="text" name="name" >		
	
password:<input type="password" name="password" >
<input type="submit" name="submit" value="click">
	
	</form>


</body>
</html>
