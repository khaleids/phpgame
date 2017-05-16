<!DOCTYPE HTML>

<?php
	require_once 'dbconfig.php';
    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,



    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
     
        
    if (isset($_POST['add'])) {
       if (isset($_POST['username']) && isset($_POST['password'])) {
	    $username = $_POST['username'] ;
    $password =$_POST['password'] ;
	   $role =$_POST['role'] ;
	$st='SELECT * FROM user where name =\':uid\' and password=\':pas\';';

			$stmt = $DB_con->prepare('INSERT INTO user(name,role,password)VALUES(:userid,:role,:passwordd);');
		$stmt->bindParam(':userid',$username);
		$stmt->bindParam(':role',$role);
		$stmt->bindParam(':passwordd',$password);
			$stmt->execute();
			echo "dcdd";
	echo  $stmt->rowCount();

	if($stmt->rowCount() > 0)
         {
         
$successMSG ="Added successfully";

             header("Location:adduser.php");
        } else {

$errMSG ="Not Add";

             header("Location:adduser.php");
        }
    }
    } else {
        //assume btnSubmit
    }
	
    
	} 
	else {
	$errMSG ="Your are not log in you be redirct to login page in 2 Second.";
        header("refresh:2;login.php");
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


<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   
        <form  class="form-horizontal"  method="post" action="adduser.php">
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
	   <div class="col-sm-10">
  <label for="role">Role:</label>
  <select class="form-control" name="role">
    <option value="admin">Admin</option>
    <option value="user">User</option>

  </select>
  </div>
</div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="add" class="btn btn-default">Add</button>
      </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="delete" class="btn btn-default">Delete</button>
      </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="update" class="btn btn-default">Update</button>
      </div>
    </div>
        </form>
    </body>
</html>