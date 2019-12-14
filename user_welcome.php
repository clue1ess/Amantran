<?php

    session_start();
    $name = $_SESSION['cid'];
   $result = "";
   include 'connection.php';
   $conn = OpenCon();
   date_default_timezone_set('Asia/Calcutta');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
       $query = "select * from (online_order natural join (order_food natural join food_item)) natural join order_food_status where c_id = \"$name\"";
       $result = $conn->query($query);

?>
<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
    <div class="hero-image6">
		<div id="sideNavigation" class="sidenav">
			 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			 <a href="index.html">Home</a>
			 <a href="menu.html">Menu</a>
			 <a href="login.html">Login</a>
			 <a href="about_us.php">About Us</a>
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
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <?php
            $date_ = date('d/m/Y h:i a', time());
            echo "<h2 style=\"text-align:left;\"><font color=\"white\" size=\"6\">".$date_."</h2></font>";

        ?>
        <form action="em_info.php" method="POST">
           <!-- -->
            
            <div class="container">   
                
            <center>
            <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="user_order.php"><font color="white">Online Order</font></a></button>
            <button type="button" class="btn btn-success"><a style="text-decoration:none" href="book_table.php"><font color="white">Book Table</font></a></button>
            <button type="button" class="btn btn-warning"><a style="text-decoration:none" href="user_edit.php"><font color="white">Edit Profile</font></a></button>
            <button type="button" class="btn btn-danger"><a style="text-decoration:none" href="user_login.php"><font color="white">Logout</font></a></button><br><br>
            <?php
                   // var_dump($date);
                   
                   
                   // if($date != "" || $time != "") {
                        if($result->num_rows > 0) {
                                    echo "<h2><font color = \"white\" size=\"6\">Order Summary</h2></font><br>";
                                    echo "<table style=\"color:white\"class=\"table\">
                                    <thead class=\"thead-dark\">
                                      <tr>
                                        <th scope=\"col\">Order No</th>
                                        <th scope=\"col\">Food Item</th>
                                        <th scope=\"col\">Quantity</th>
                                        <th scope=\"col\">Status</th>
                                        <th scope=\"col\">Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                    while($row = $result->fetch_assoc()) {
                                      $s = $row['status'];
                                      $status = "";
                                      if($s == '0') {
                                        $status = "Not Approved";
                                      }
                                      else if($s == '1') {
                                        $status = "Approved";
                                      }
                                      else if($s == '2') {
                                        $status = "Pending";
                                      }
                                      echo "<tr>
                                        <th scope=\"row\">".$row['order_no']."</th>
                                        <td>".$row['f_name']."</td>
                                        <td>".$row['quantity']."</td>
                                        <td>".$status."</td>
                                        <td>".$row['date']."</td>
                                      </tr>";
                                    }
                                    echo "</tbody>
</table>";
                        }
                   // }
            ?>
        </form>
</center>
        
                      </div></div>
                      </body>

</html>