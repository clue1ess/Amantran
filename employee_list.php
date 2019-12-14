<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "rms";
    $conn = new mysqli ($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "select e_id, e_fname, e_lname, email, phone_no, role, salary, street, city, state from employee";
    $result = $conn->query($query);

?>
<html>
    <head>
		<title>Admin</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body bgcolor="#FFF8DC">
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
        <form action="employee_list.php" method="POST">
            
            <?php
                if($result->num_rows > 0) {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>email</th>
                                    <th>Contact no.</th>
                                    <th>Role</th>
                                    <th>Salary</th>
                                    <th>Street</th>
                                    <th>City</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tbody>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><input type=\"checkbox\" onclick=\"getRow(this)\"  /></td>";
                                echo "<td>".$row['e_id']."</td>";
                                echo "<td>".$row['e_fname']."</td>";
                                echo "<td>".$row['e_lname']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['phone_no']."</td>";
                                if($row['role'] == 'm') {
                                    echo "<td>Manager</td>";
                                }
                                else if($row['role'] == 'w') {
                                    echo "<td>Waiter</td>";
                                }
                                else if($row['role'] == 'c') {
                                    echo "<td>Chef</td>";
                                }
                                else if($row['role'] == 'd') {
                                    echo "<td>Delivery Boy</td>";
                                } 
                                echo "<td>".$row['salary']."</td>";
                                echo "<td>".$row['street']."</td>";
                                echo "<td>".$row['city']."</td>";
                                echo "<td>".$row['state']."</td>";
                            echo"</tr>";
                        }
                        echo "</tbody>
                                </table>";
                }
            ?>
        </form>
    </body> 
</html>