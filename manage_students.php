<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Dashboard</title>
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

        <table>
                <caption><hr/>Manage Students<hr/></caption>
                <tr>
                    <th>NAME</th>
                    <th>ROLL NO</th>
                    <th>CLASS</th>
                    <th>Action</th>
                </tr>
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT * FROM `students` ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
         ?>       


             <tr>
                <td hidden><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['rno']; ?></td>
                <td><?php echo $row['class_name']; ?></td>
                 <td><a href="delete-student.php?id=<?php echo $row['id']; ?>"><font color="red">Delete </font></a> | <a href="update-student.php?id=<?php echo $row['id']; ?>"><font color="red">Edit</font></a></td>

                </tr>";


            <?php
            }
            ?>

</table>
    </div>

    <div class="footer">
      <!--   <span>Designed & Coded By Sagar Malla</span> -->
    </div>
</body>
</html>
