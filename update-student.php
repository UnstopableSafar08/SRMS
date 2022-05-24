
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                     <a href="view-all-result.php">View All</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="update-student.php" method="POST">
            <fieldset>
                <?php

    include('init.php');
    if (isset($_POST['update'])) {
    # code...
    $id=$POST['id'];
    $name=$POST['name'];
    $rno=$POST['rno'];
    $class_name=$POST['class_name'];

    $q="UPDATE student SET name='$name', rno='$rno', class_name='$class_name' WHERE id='$id' ";
    $Results = mysqli_query($conn,$q);

    header("Location: manage_students.php");
 
       }

                    $id = $_GET['id'];
                    //selecting data associated with this particular id
                    $sql = "SELECT * FROM `students` ";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                            {
                                $name = $row['name'];
                                $rno = $row['rno'];
                                $class_name = $row['class_name'];
                            } 

?>
                <legend>Update Student</legend>

                <input type="text" name="name" value="<?php echo $name;?>" />
                <input type="text" name="rno" value="<?php echo $rno;?>" />
                <input type="text" name="class_name" value="<?php echo $class_name;?>" />

                <input type="hidden" name="id" value=<?php echo $_GET['id'];?> />
                <input type="submit" name="update" value="Update" />
            </fieldset>
        </form>
    </div>

    <div class="footer">
        <!-- <span>&copy Designed & Coded By Jibin Thomas</span> -->
    </div>
</body>
</html>