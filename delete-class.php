<?php
//including the database connection file
include("init.php");
// include("session.php");
//getting id of the data from url
$c_id = $_GET['c_id'];
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM `class` WHERE c_id='$c_id'");
//redirecting to the display page (index.php in our case)
header("Location:manage_classes.php");
?>