<?php
    session_start();
    $err = "";
    include 'connection.php';
    $conn = OpenCon();
    $fnameerr = "";
    $lnameerr = "";
    $phnerr = "";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "select * from food_item";
    $result = $conn->query($query);
    
  //}
?>
<html>
    <head>
		<title>Order Food</title>
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
        <script>
            function goBack() {
                window.location.href = "http://localhost/rms/em_info.php";
            }
        </script>
        <center>
            <font color="white">
            <h1><font size="6">Food Details<br><br></h1></font>
            <br>
            <form method = "POST" action = "take_order.php">
                <div class="container">
            <?php
                if($result->num_rows == 0) {
                    echo "<strong>No food items found</strong>";
                } 
                else {
                    echo "<table style=\"color:#ffffff\" class=\"table\">
                    <thead class=\"thead-dark\">
                      <tr>
                        <th scope=\"col\">No</th>
                        <th scope=\"col\">Name</th>
                        <th scope=\"col\">Category</th>
                        <th scope=\"col\">Price</th>
                        <th scope=\"col\">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>";
                while($row = $result->fetch_assoc()) {
                    $id = $row['f_id'];
                      echo "<tr>
                        <th scope=\"row\">
                        <input type=\"checkbox\" name=\"select[]\" value=\"$id\"/></th>
                        <td>".$row['f_name']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['price']."</td>
                        <td><input type=\"number\"  name=\"$id\" min=\"1\" max = \"50\"/><br><font color=\"red\">".$err."</font><br></td>
                         
                      </tr>";
                    }
                    echo "</tbody>
                    </table>";
                }
                /*if(isset($_POST['getid'])) {
                        $id = $_POST['getid'];
                        $sql = "delete from food_item where f_id = \"$id\"";
                        $success = $conn->query($sql);
                        if($success) {
                            echo "Food Item deleted successfully!";
                        }
                    }*/
                    
            ?>
            
                   <!-- <div>
                        <button class="btn btn-primary" name ="bill"><font color="white">View Bill</font></button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="user_welcome.php"><font color="white">Go back</font></a></button>                        
                    </div>-->
                    <div>
                        <button class="btn btn-primary" name ="bill"><font color="white">View Bill</font></button>
                        <!--<button type="button" class="btn btn-primary"><a style="text-decoration:none" href="change_pwd.php"><font color="white">Reset</font></a></button>-->
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="em_info.php"><font color="white">Back</font></a></button><br><br>
                                  
                    </div>
                    <?php 
                   
                   $dict = array();

                    if(isset($_POST['bill'])) {
                        if(empty($_POST["select"])) {
                            echo "<strong><font color=\"white\">No item Selected!</font></strong>";
                        }
                        else {
                            
                            $total = 0;
                            $t = "create table temp(f_id int, quantity int)";
                            $tt = $conn->query($t);
                            foreach($_POST['select'] as $item){
                                $quantity = $_POST[$item];
                                if($quantity != ""){
                                   /* $dict[] = $item;
                                    $dict[] = $quantity;*/
                                    $sql = "insert into temp values(\"$item\", \"$quantity\")";
                                    $price = $conn->query($sql);
                                    $q = intval($quantity);
                                    $sql = "select price from food_item where f_id = \"$item\"";
                                    $price = $conn->query($sql);
                                    $p = $price->fetch_assoc();
                                    $pp = intval($p['price']);
                                    $total = $total + $pp * $q;
                                }
                            }
                            $sql = "insert into temp values(\"-1\", \"$total\")";
                            $price = $conn->query($sql);
                            echo "<strong> <font color = \"white\" size=\"5\">Bill : ".$total."</strong><br></font>";
                            echo " <label>First Name</label>
                            <input type=\"text\" maxlength = \"20\" placeholder=\"Enter First Name\" class=\"input-xlarge\" name=\"fname\" required>
                           <br><font color=\"red\" size=\"4\">".$fnameerr."</font>
                            <label>Last Name</label>
                            <input type=\"text\" maxlength = \"20\" placeholder=\"Enter Last Name\" class=\"input-xlarge\" name=\"lname\"required>
                            <br><font color=\"red\" size=\"4\">".$lnameerr."</font>
                            <label>Phone No</label>
                            <input type=\"text\" maxlength = \"10\" placeholder=\"Enter Mobile No\" class=\"input-xlarge\" name=\"phone_no\" required>
                            <br><font color=\"red\" size=\"4\">".$phnerr."</font>
                            <button class=\"btn btn-primary\" name =\"place\"><font color=\"white\">Place order</font></button>";
                                                 
                            }
                    }
                   if(isset($_POST['place'])) {
                       $f = $_POST['fname'];
                       $l = $_POST['lname'];
                       $p = $_POST['phone_no'];
                       if(!preg_match("/^[a-zA-Z ]*$/",$f )) {
                        $fnameerr = "Only aplhabets are allowed";
                    }
                    else if(!preg_match("/^[a-zA-Z ]*$/",$l)) {
                        $lnameerr = "Only aplhabets are allowed";
                    }
                    else if(!preg_match("/^[1-9][0-9]{9}$/",$p)) {
                        $phnerr = "Enter 10-digit mob no";
                    }
                    else {
                       $g = "insert into customer_visited values(\"NULL\", \"$f\", \"$l\", \"$p\")";
                       $gg = $conn->query($g);
                       $i = 0;
                       //$dict = $_SESSION["a"];
                       $count = count($dict);
                      // var_dump($dict);
                       $g = "select c_id from customer_visited where c_fname = \"$f\" and c_lname = \"$l\" and phone_no = \"$p\"";
                       $gg = $conn->query($g);
                       $t = $gg->fetch_assoc();
                       $id = $t['c_id'];
                       $date_ = date('y-m-d');
                       $date = "20".date('y-m-d',strtotime($date_));
                       $time_ = date('h:i', time());
                       $time =date('H:i',strtotime($time_));
                       $g = "insert into order_food_status values (\"NULL\", \"1\", \"$date\", \"$time\")";
                       $gg = $conn->query($g);
                       $g = "select max(order_no) as m from order_food_status";
                       $gg = $conn->query($g);
                       $t = $gg->fetch_assoc();
                       $order = $t['m'];
                       
                       $g = "insert into offline_order values (\"$order\", \"$id\")";
                       $gg = $conn->query($g);
                       $y = "select * from temp";
                       $yy = $conn->query($y);
                       if($yy) {
                       while($ttt = $yy->fetch_assoc()) {
                            $i = $ttt['f_id'];
                            $j = $ttt['quantity'];
                            if($i == "-1") {
                                $g = "insert into payment_details values (\"NULl\", \"$order\", \"$j\")";
                                $gg = $conn->query($g);
                            }
                            else {
                           $g = "insert into order_food values (\"$order\", \"$i\", \"$j\")"; 
                           $gg = $conn->query($g);
                            }
                       }
                       
                    
                       $g = "drop table temp";
                       $gg = $conn->query($g);
                       
                    }
                }
                    }
                    ?>
            </div>></div>
                </form></font>
        </center>
    </body>     
</html>