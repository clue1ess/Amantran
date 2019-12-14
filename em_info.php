<?php
   $result = "";
   date_default_timezone_set('Asia/Calcutta');
   $date_ = date('y-m-d');
   $date = date('y-m-d',strtotime($date_));
   //$time_ = date('h:i:s', time());
   //$time=date('H:i:s',strtotime($time_));
  // $array = array();
  include 'connection.php';
  $conn = OpenCon();

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   if(isset($_POST['Go'])) {
       //echo "chhjc";
       $date = $_POST['date'];
      // $time = $_POST['time'];
       $date=date('Y-m-d',strtotime($date));    //Converts date to 'yyyy-mm-dd' acceptable to mysql
      // $time=date('H:i:s',strtotime($time));    //converts time to HH:mm:ss
   }
        //var_dump($date);
       $query = "select t_no, e_id, e_fname, e_lname from table_details natural join employee where date=\"$date\"";
       $result = $conn->query($query);
      // $count = $result->num_rows;
      // $array = array()
      /* while($row = $result->fetch_assoc()) {
            $array[] = $row;
       }*/
   

?>
<html>
	<head>
		<title>Manager Login</title>
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
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <?php
            $date_ = date('d/m/Y h:i a', time());
            echo "<h2 style=\"text-align:left;\"><font color=\"white\" size=\"8\">".$date_."</h2></font>";

        ?>
        <form action="em_info.php" method="POST">
           <!-- -->
            
               
                <div class="container">
            <center>
            <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="online_orders.php"><font color="white">Order Confirmation</font></a></button>
            <button type="button" class="btn btn-success"><a style="text-decoration:none" href="change_waiter.php"><font color="white">Change Waiter's Slot</font></a></button>
            <button type="button" class="btn btn-default"><a style="text-decoration:none" href="take_order.php"><font color="black">Take order</font></a></button>
            <button type="button" class="btn btn-warning"><a style="text-decoration:none" href="ee_info.php"><font color="white">Edit Profile</font></a></button>
            <button type="button" class="btn btn-danger"><a style="text-decoration:none" href="employee_login.php"><font color="white">Logout</font></a></button>
            <font color="white" size="6">
            <label for='date' ><h4>DATE : </h4></label><br>
            <input type='date' name='date' id='date' size="10" style="height: 20px;"/> <br><br>
            <!--<label for='time' ><h4>TIME : </h4></label><br>
            <input type='time' name='time' id='time' maxlength="20" size="10" style="height: 20px;"/><br><br>-->
            <input type='submit' name='Go' value='Go'  style="height:30px; width:40px" /><br><br>

            <?php
                   // var_dump($date);
                   
                   
                    if($date != "" || $time != "") {
                        if($result->num_rows > 0) {
                                    echo "<h2>Waiter's Time Slot</h2>";
                                    echo "<font color=\"white\" size=\"4\"><h2>Date : ".$date."</h2></font>";
                                    echo "<table style=\"color:#ffffff\" class=\"table\">
                                    <thead class=\"thead-dark\">
                                      <tr>
                                        <th scope=\"col\">Table No</th>
                                        <th scope=\"col\">Employee ID</th>
                                        <th scope=\"col\">First Name</th>
                                        <th scope=\"col\">Last Name</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                    while($row = $result->fetch_assoc()) {
                                      echo "<tr>
                                        <th scope=\"row\">".$row['t_no']."</th>
                                        <td>".$row['e_id']."</td>
                                        <td>".$row['e_fname']."</td>
                                        <td>".$row['e_lname']."</td>
                                      </tr>";
                                    }
                                    echo "</tbody>
</table>";
                        }
                    }
            ?>
        </form>
        </center>
                  </font>
                  </div></div>
                  </body>



</html>