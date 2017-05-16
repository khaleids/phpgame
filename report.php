<!DOCTYPE HTML>

<?php
	require_once 'dbconfig.php';
    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,


    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.

        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    
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
             echo "<table><tr><th>Division 1</th><th>Target</th><th>Techne</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
     }
     echo "</table>";
             header("Location:index.php");
        } else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
        }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="import" href="header.html">
 <script src="https://www.w3schools.com/lib/w3.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
 <link rel="stylesheet" type="text/css" href="css/me.css">

<style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
 <body>

<div w3-include-html="header.html"></div> 

<script>
w3.includeHTML();
</script>


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