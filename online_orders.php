<?php
    include 'connection.php';
    $conn = OpenCon();
    $date_ = date('y-m-d');
    $date = date('y-m-d',strtotime($date_));
    $item = "";
    $message = "Pending";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "select * from order_food_status natural join online_order where date=\"$date\" and status = 2";
    $result = $conn->query($query);
    

?>
<html>
	<head>
		<title>Online Order Conformation</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
        <form action="online_orders.php" method="POST">
            <div class="container">
                <font color="white" size="6">
            <center>
            <?php
            $order = "";
            if ($result->num_rows == 0) {
                echo "<strong>No Pending Online Orders for conformation.</strong><br><br>";
            }
            else {
               /* if ($alert_result) {
                    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";//.$message;
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"success\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                         </button>";
                    echo "</div>";
                }*/
                echo "
                    <table style=\"color:#ffffff\" class=\"table \">
                        <thead class=\"thead-light\">
                            <tr>
                                <th>Order No</th>
                                <th>Order</th>
                                <th>Customer ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
               // $i = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['order_no']."</td>";
                    $order = $row['order_no'];
                    $q = "select f_name, quantity from order_food natural join food_item where order_no=\"$order\"";
                    $res = $conn->query($q);
                    echo "<td>";
                    while($r = $res->fetch_assoc()) {
                        echo $r['f_name']."         ".$r['quantity']."<br>";
                    }
                    echo"</td>";
                    echo "<td>".$row['c_id']."</td>";
                    //echo"<td>hghjd</td><td>gyfgejg</td>";
                    echo "<td style=\"color:yellow\">".$message."</td>";
                    echo "<center><td>";
                        echo "<input type=\"submit\" name=\"C".$order."\" value= \"&#10004\"/>";
                   
                    echo 
                    "<input type=\"submit\"  name=\"N".$order."\" value= \"&#x2717\"/>";
                           
                      echo "</td>
                    </center>
                    ";
                    echo "</tr>";}
                echo "
                        </tbody>
                    </table>
                ";
            }
            echo "<button type=\"button\" class=\"btn btn-primary\"><a style=\"text-decoration:none\" href=\"em_info.php\"><font color=\"white\">BACK</font></a></button>";
            if(isset($_POST)) {
                foreach($_POST as $key => $value){
                    if($key[0] == 'C') {
                        $order = substr($key, 1);
                        $que = "Update order_food_status set status = 1 where order_no = \"$order\"";
                        $resul= $conn->query($que);

                        $que = "select * from order_food natural join food_item where order_no = \"$order\"";
                        $resul= $conn->query($que);

                        $total = 0;
                        while($row = $resul->fetch_assoc()) {
                            $p = $row['price'];
                            $q = $row['quantity'];
                            $p = intval($p);
                            $q = intval($q);
                            $total = $total + ($p * $q);
                        }
                        $total = (string) $total;
                        $que = "insert into payment_details values (\"NULL\",\"$order\", \"$total\")";
                        $resul= $conn->query($que);
                        if($resul) {
                            $message = "Approved";
                            //header('Location: ./online_orders.php');
                            $URL="http://localhost/rms/online_orders.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 
                        }  
                }
                else if($key[0] == 'N') {
                    $order = substr($key, 1);
                    $quer = "Update order_food_status set status = 0 where order_no = \"$order\"";
                    $resu = $conn->query($quer);
                    if($resu) {
                        $message = " Not Approved";
                       // header('Location: ./online_orders.php');
                    }  
                }
            }
        }
            ?>
         </div></div></font>
            <center>
        </form>
    </body>
</html>
