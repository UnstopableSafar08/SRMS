<!DOCTYPE html>
<html>
<head>
	<title>Search Data from Result</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/view-res.css">
    <link rel="stylesheet" type='text/css' href="css/search.css">
	<style>
		input{
			width: 25%;
			height: 5%;
			border-radius: 05px;
			padding: 8px 15px 8px 15px;
			margin: 10px 0px 15px 0px;
			/*box-shadow: 1px 1px 2px 1px gray;*/
		}
	</style>
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
	<hr>
 <form action="#" method="POST"><center>
 	<input type="text" name="roll" placeholder="Enter roll no"/>
 	<input type="text" name="name" placeholder="Enter Name"/>
    <input type="text" name="class" placeholder="Enter Class"/><br/>
 	<input type="submit" name="search" value="Search" />
 	<input type="reset" name="reset" value="Reset"><hr></center>
 </form>


  <?php
  			
            include('init.php');
            include('session.php');

            $r=$_POST['roll'];
            $n=$_POST['name'];
            $class=$_POST['class'];
           

            $sql = "SELECT * FROM result WHERE name='$n' AND rno='$r' AND class='$class'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
               <hr/>
                <caption>Searched Results<hr/></caption>

                <tr>
                    <th>NAME</th>
                    <th>ROLL NO</th>
                    <th>CLASS</th>
                    <th>Sub 1</th>
                    <th>Sub 2</th>
                    <th>Sub 3</th>
                    <th>Sub 4</th>
                    <th>Sub 5</th>
                    <th>Obt marks</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['p1'] . "</td>";
                    echo "<td>" . $row['p2'] . "</td>";
                    echo "<td>" . $row['p3'] . "</td>";
                    echo "<td>" . $row['p4'] . "</td>";
                    echo "<td>" . $row['p5'] . "</td>";
                    echo "<td>" . $row['marks'] . "</td>";
                    echo "<td>" . $row['percentage'] . "</td>";
                    
                    echo "<td><a href=\"edit.php?rno=$row[rno]\"><font color='white'> Edit</font></a> | <a href=\"delete-res.php?rno=$row[rno]\" onClick=\"return confirm('Are you sure you want to delete?')\"><font color='red'>Delete</font></a></td>";
                    echo "</tr>";
                  }

                echo "</table>";
            } else {
                echo "<br/><br/><br/><br/><br/><center><font color='red'>No Results are in Database !!</font></center>";
            }
        ?>

</body>
</html>