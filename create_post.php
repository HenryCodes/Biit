<title>Create Post | Biit</title>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<?php
include 'header.php';
?>

<form action="insert.php" method="post">
        <input autocomplete="off" type="text" hidden name="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
        <input autocomplete="off" type="text" hidden name="userID" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>">
        <br><p align="center"><input autocomplete="off" maxlength="420" required type="text" name="text"></center>
    <br><input type="submit" value="Submit">
</form>