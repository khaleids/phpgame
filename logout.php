<?php
    session_start();

$_SESSION['loggedIn'] = false;
if(session_destroy()) // Destroying All Sessions
{
header("Location:login.php"); // Redirecting To Home Page
}
?>