<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<meta http-equiv="refresh" content="2; URL='index.php'" />
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "Biit");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$userID = mysqli_real_escape_string($link, $_REQUEST['userID']);
$text = mysqli_real_escape_string($link, $_REQUEST['text']);
 
// Attempt insert query execution
$sql = "INSERT INTO posts (username, userID, text) VALUES ('$username', '$userID', '$text')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully. Redirecting.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
