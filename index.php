<title>Home | Biit</title>
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

.textcolor {
color: #5f93e8;
}

.post {
width: 80%;
border: 1px solid darkgray;
border-radius: 3px;
}

.post a {
text-decoration: none;
}

.post a:hover {
text-decoration: underline;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  width: 90%;
}

/* Left and right column */
.column2 {
  float: right;
  width: 10%;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="row">
  <div class="column">

 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "biit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, userID, text FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<center><p align='center'><div class='post'><a href='profile.php?id=" . $row["userID"]. "'> " . $row["username"]. "</a></p><p class='textcolor'> " . htmlspecialchars($row["text"]) . "</p></div></center>";
    }
} else {
    echo "Nothing has been posted!";
}
$conn->close();
?>

  </div>
  
  <div class="column2">
    <h2><?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
    <form action="logout.php">
  <input type="submit" value="Logout">
	</form> 
	
  </div>
</div>
  