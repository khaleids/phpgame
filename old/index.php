<!DOCTYPE HTML>

<?php
	require_once 'dbconfig.php';
    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,


    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: success.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
	    $username = $_POST['username'] ;
    $password =$_POST['password'] ;
	$st='SELECT * FROM user where name =\':uid\' and password=\':pas\';';
	//$stmt = $DB_con->prepare('SELECT * FROM user where name =:uid and password=:pas;');
		//$stmt = $DB_con->prepare('SELECT * FROM user where name =\'khaled\' and password=\'1\';');
			$stmt = $DB_con->prepare('SELECT * FROM user where name =:userid and password=:passwordd;');
		$stmt->bindParam(':userid',$username);
		$stmt->bindParam(':passwordd',$password);
			
			$stmt->execute();
	//echo  $stmt->queryString;
	echo $_POST['username'];
		echo $_POST['password'];
	if($stmt->rowCount() > 0)
         {
            $_SESSION['loggedIn'] = true;
            header('Location: success.php');
        } else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
        }
    }
?>


<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
    <body>
        <!-- Output error message if any -->
        <?php echo $error; ?>
        
        <!-- form for login -->
        <form  class="form-horizontal"  method="post" action="login.php">
		    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
            <input type="text" name="username" id="username"><br/>
			</div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">   
            
            <input type="password" name="password" id="password"><br/>
			</div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
        </form>
    </body>
</html>