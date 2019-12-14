<?php
    session_start();
    $err = "";
    include 'connection.php';
    $conn = OpenCon();
    $email = $_SESSION["email"];
    $password = $_SESSION["passwd"];

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
            <form method = "POST" action = "user_order.php">
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
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="user_welcome.php"><font color="white">Back</font></a></button><br><br>
                                  
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
                            echo "<strong> <font color = \"white\" size=\"5\">Bill : ".$total."</strong><br></font><br>";
                            echo "
                            <button class=\"btn btn-primary\" name =\"place\"><font color=\"white\">Place order</font></button>";
                                                 
                            }
                    }
                   if(isset($_POST['place'])) {
                       $i = 0;
                       //$dict = $_SESSION["a"];
                       $count = count($dict);
                      // var_dump($dict);
                       $g = "select c_id from customer where email = \"$email\" and passwd = \"$password\"";
                       $gg = $conn->query($g);
                       $t = $gg->fetch_assoc();
                       $id = $t['c_id'];
                       $date_ = date('y-m-d');
                       $date = "20".date('y-m-d',strtotime($date_));
                       $time_ = date('h:i', time());
                       $time =date('H:i',strtotime($time_));
                       $g = "insert into order_food_status values (\"NULL\", \"2\", \"$date\", \"$time\")";
                       $gg = $conn->query($g);
                       $g = "select max(order_no) as m from order_food_status";
                       $gg = $conn->query($g);
                       $t = $gg->fetch_assoc();
                       $order = $t['m'];
                       
                       $g = "insert into online_order values (\"$order\", \"$id\")";
                       $gg = $conn->query($g);
                       $y = "select * from temp";
                       $yy = $conn->query($y);
                       if($yy) {
                       while($ttt = $yy->fetch_assoc()) {
                            $i = $ttt['f_id'];
                            $j = $ttt['quantity'];
                           $g = "insert into order_food values (\"$order\", \"$i\", \"$j\")"; 
                           $gg = $conn->query($g);
                       }
                       
                       $g = "drop table temp";
                       $gg = $conn->query($g);
                    }
                    }
                    ?>
            </div>></div>
                </form></font>
        </center>
    </body>     
</html>