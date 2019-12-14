<?php
    include 'connection.php';
    $conn = OpenCon();
   $result = "";
   date_default_timezone_set('Asia/Calcutta');
   $date_ = date('y-m-d');
   $date = date('y-m-d',strtotime($date_));
  

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   if(isset($_POST['Go'])) {
       $date = $_POST['date'];
       $date=date('Y-m-d',strtotime($date));    //Converts date to 'yyyy-mm-dd' acceptable to mysql
      // $time=date('H:i:s',strtotime($time));    //converts time to HH:mm:ss
     /* $query1 = "select * from customer natural join (select * from order_food_status natural join online_order where date=\"$date\") as A";
       $result1 = $conn->query($query1);
       $query2 = "select * from customer_visited natural join (select * from order_food_status natural join offline_order where date=\"$date\") as B";
       $result2 = $conn->query($query2);
       $query3 = "select sm, f_id, f_name from food_item natural join (select sum(quantity)as sm, f_id from order_food natural join order_food_status where date = \"$date\" group by f_id) as c";
       $result3 = $conn->query($query3);
       $query4 = "select sum(amount) as amt from order_food_status natural join payment_details where date=\"$date\"";
       $result4 = $conn->query($query4);/*/

   }
        //var_dump($date);
       $query1 = "select * from customer natural join (select * from order_food_status natural join online_order where date=\"$date\") as A";
       $result1 = $conn->query($query1);
       $query2 = "select * from customer_visited natural join (select * from order_food_status natural join offline_order where date=\"$date\") as B";
       $result2 = $conn->query($query2);
       $query3 = "select sm, f_id, f_name from food_item natural join (select sum(quantity)as sm, f_id from order_food natural join order_food_status where date = \"$date\" group by f_id) as c";
       $result3 = $conn->query($query3);
       $query4 = "select sum(amount) as amt from order_food_status natural join payment_details where date=\"$date\"";
       $result4 = $conn->query($query4);

      // $count = $result->num_rows;
      // $array = array()
      /* while($row = $result->fetch_assoc()) {
            $array[] = $row;
       }*/
   

?>
<html>
	<head>
		<title>Admin Login</title>
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
            echo "<h2 style=\"text-align:left;\"><font color=\"white\">".$date_."</h2></font>";

        ?>
        <form action="a_info.php" method="POST">
           <!-- -->
            
               <div class="container">
                
            <center>
            <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="food_details.php"><font color="white">Food Item Details</font></a></button>
            <button type="button" class="btn btn-success"><a style="text-decoration:none" href="employee_details.php"><font color="white">Employee's Details</font></a></button>
            <button type="button" class="btn btn-basic"><a style="text-decoration:none" href="new_admin.php"><font color="black">Add New Admin</font></a></button>
            <button type="button" class="btn btn-warning"><a style="text-decoration:none" href="aa_info.php"><font color="white">Edit Profile</font></a></button>
            <button type="button" class="btn btn-danger"><a style="text-decoration:none" href="admin_login.php"><font color="white">Logout</font></a></button><br><br>
            <label for='date' ><font color=white><h4>DATE : </h4></label><br></font>
            <input type='date' name='date' id='date' maxlength="10" size="10" style="height: 20px;"/> <br><br>
            <!--<label for='time' ><h4>TIME : </h4></label><br>
            <input type='time' name='time' id='time' maxlength="20" size="10" style="height: 20px;"/><br><br>-->
            <input type='submit' name='Go' value='Go'  style="height:30px; width:40px" /><br><br>
            </center>
            <?php
                   // var_dump($date);
                   
                   
                   // if($date != "" || $time != "") {
                       echo "<font color=\"white\" size = \"5\"><strong>Customer Placed Online order Details<br></strong></font><br>";
                        if($result1->num_rows > 0) {
                                    echo "<table style=\"color:#ffffff\" class=\"table\">
                                    <thead class=\"thead-dark\">
                                      <tr>
                                        <th scope=\"col\">Customer ID</th>
                                        <th scope=\"col\">First Name</th>
                                        <th scope=\"col\">Last Name</th>
                                        <th scope=\"col\">Email</th>
                                        <th scope=\"col\">Phone No</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                    while($row = $result1->fetch_assoc()) {
                                      echo "<tr>
                                        <th scope=\"row\">".$row['c_id']."</th>
                                        <td>".$row['c_fname']."</td>
                                        <td>".$row['c_lname']."</td>
                                        <td>".$row['email']."</td>
                                        <td>".$row['phone_no']."</td>
                                      </tr>";
                                    }
                                    echo "</tbody>
</table><br><br>";
                        }
                        else {
                            echo "<font color=\"white\">No order placed today!<br></font><br>";
                        }
                        echo "<strong><font color=\"white\" size = \"5\">Customer Visited Details<br></strong></font><br>";
                        if($result2->num_rows > 0) {
                                    echo "<table style=\"color:#ffffff\"class=\"table\">
                                    <thead class=\"thead-light\">
                                      <tr>
                                        <th scope=\"col\">Customer ID</th>
                                        <th scope=\"col\">First Name</th>
                                        <th scope=\"col\">Last Name</th>
                                        <th scope=\"col\">Phone No</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                    while($row = $result2->fetch_assoc()) {
                                      echo "<tr>
                                        <th scope=\"row\">".$row['c_id']."</th>
                                        <td>".$row['c_fname']."</td>
                                        <td>".$row['c_lname']."</td>
                                        <td>".$row['phone_no']."</td>
                                      </tr>";
                                    }
                                    echo "</tbody>
</table><br><br>";
                        }
                        else {
                            echo "<font color=\"white\">No customer visited today!<br></font><br>";
                        }
                        echo "<strong><font color=\"white\" size=\"5\">Food items Details<br></strong></font><br>";
                        if($result3->num_rows > 0) {
                                    echo "<table style=\"color:#ffffff\" class=\"table\">
                                    <thead class=\"thead-dark\">
                                      <tr>
                                        <th scope=\"col\">ID</th>
                                        <th scope=\"col\">Name</th>
                                        <th scope=\"col\">Quantity</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                    while($row = $result3->fetch_assoc()) {
                                      echo "<tr>
                                        <th scope=\"row\">".$row['f_id']."</th>
                                        <td>".$row['f_name']."</td>
                                        <td>".$row['sm']."</td>
                                      </tr>";
                                    }
                                    echo "</tbody>
</table><br>";
                        }
                        else {
                            echo "<font color=\"white\">No sales today!<br></font><br>";
                        }
                        echo "<strong>";
                        if($result4->num_rows > 0) {
                            $row = $result4->fetch_assoc();
                            echo "<font color=\"white\" size = \"5\">Total Sales = ".$row['amt']."</font>";
                        }
                        else {
                            echo "<font color=\"white\" >Total Sales = 0<br></font>";
                        }
                        echo "</strong>";
                   // }*/
            ?>
            </div>
        </form>

        
                    </div>
                    </body>

</html>