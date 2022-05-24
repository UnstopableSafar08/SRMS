<<?php
//including the database connection file
include("init.php");
// include("session.php");
//getting id of the data from url
$id = $_GET['id'];
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM `students` WHERE id='$id'");
//redirecting to the display page (index.php in our case)
header("Location:manage_students.php");
?>