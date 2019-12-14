<?php
     include 'connection.php';
     $conn = OpenCon();
    $fnameerr = "";
    $lnameerr = "";
    $phnerr = "";
    $emailerr = "";
    $pwderr = "";
    $fname = "";
    $lname = "";
    $street = "";
    $city = "";
    $state = "";
    $email = "";
    $pwd1 = "";
    $pwd2 = "";
    $phone = "";
    $msg = "";
    $note = "";
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "select * from employee";
    $result = $conn->query($query);
?>
<html>
    <head>
		<title>Employee Details</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
        <div class="hero-image6">
		<div id="sideNavigation" class="sidenav">
			 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			 <a href="index.html">Home</a>
			 <a href="menu.html">Menu</a>
			 <a href="login.html">Login</a>
			 <a href="about.html">About Us</a>
		</div>
 
		<nav class="topnav">
		 	<a href="#" onclick="openNav()">
				<svg width="30" height="30" id="icoOpen">
					<path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
					<path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
					<path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
		   		 </svg>
		  	</a>
		</nav>
        <script src="script.js"></script>
        <!--  has access to number of employees, customers visited per day, summary of all sales (total sales per day/month/year),
         summary of all food items sold per day .add new employees
         view current employee and edit their info.-->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
            function SomeDeleteRowFunction() {
      // event.target will be the input element.
      var td = event.target.parentNode; 
      var tr = td.parentNode; // the row to be removed
      tr.parentNode.removeChild(tr);
}
</script>
        <center>
            <h1><font color="white" size="8">Employee Details<br><br></h1></font>
            <br>
            <form method = "POST" actions = "employee_details.php">
                <div class="container">
            <?php
                if($result->num_rows == 0) {
                    echo "<strong><font color=\"white\">No employers found!</strong></font><br>";
                } 
                else {
                    echo "<table style=\"color:#ffffff\" class=\"table\">
                    <thead class=\"thead-dark\">
                      <tr>
                        <th scope=\"col\">Employee ID</th>
                        <th scope=\"col\">First Name</th>
                        <th scope=\"col\">Last Name</th>
                        <th scope=\"col\">Role</th>
                        <th scope=\"col\">Email</th>
                        <th scope=\"col\">Phone no</th>
                        <th scope=\"col\">Street</th>
                        <th scope=\"col\">City</th>
                        <th scope=\"col\">State</th>
                        <th scope=\"col\">Salary</th>
                        <th scope=\"col\">Actions</th>
                      </tr>
                    </thead>
                    <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $str = $row['role'];
                        if($str == 'm') {
                            $str = "Manager";
                        }
                        else if($str == 'w') {
                            $str = "Waiter";
                        }
                        else if($str == 'c') {
                            $str = "Chef";
                        }
                        else if($str == 'd') {
                            $str = "Delivery Boy";
                        }
                        $id = $row['e_id'];
                      echo "<tr>
                        <th scope=\"row\">".$row['e_id']."</th>
                        <td>".$row['e_fname']."</td>
                        <td>".$row['e_lname']."</td>
                        <td>".$str."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone_no']."</td>
                        <td>".$row['street']."</td>
                        <td>".$row['city']."</td>
                        <td>".$row['state']."</td>
                        <td>".$row['salary']."</td>
                        <td><input type=\"hidden\" name=\"getid\" value=\"$id\"/>
                        <input type=\"submit\"  name=\"$id\" value= \"&#x2717\" /></td>
                         
                      </tr>";
                    }
                    echo "</tbody>
                    </table>";
                }
                if(isset($_POST['getid'])) {
                        $id = $_POST['getid'];
                        $sql = "delete from employee where e_id = \"$id\"";
                        $success = $conn->query($sql);
                        if($success) {
                            $note = "Employee deleted successfully!";
                            echo "<font color=\"white\">".$note."</font><br>";
                            //header('Location: ./employee_details.php');
                            $URL="http://localhost/rms/employee_details.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 
                        }
                        else {
                            $note = "";
                        }
                        }
                        
                    
            ?>
            
                    <div>
                        <button class="btn btn-primary" name ="add"><a style="text-decoration:none" href="new_employee.php"><font color="white">Add new</a></font></button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="a_info.php"><font color="white">Go back</font></a></button>                        
                    </div>
            </div>
                </div>
            </form>
        </center>
    </body>     
</html>