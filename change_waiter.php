<?php
     include 'connection.php';
     $conn = OpenCon();
     $note ="";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   /* $date_ = date('y-m-d');
    $date = "20".date('y-m-d',strtotime($date_));*/
    $query = "select * from table_";
    $result = $conn->query($query);
    /*if(!$result) {
        $date = date('Y/m/d',strtotime("-1 days"));
        $query = "select * from employee natural join table_details where date = \"$date\"";
        $result = $conn->query($query);
    }
    else {
        die;
    }*/
    if(isset($_POST['submit'])) {
        $quer = "select t_no from table_";
        $resul = $conn->query($quer);
        $date_ = date('y-m-d');
        $date = "20".date('y-m-d',strtotime($date_));
        //echo"1";
        if($resul->num_rows == 0) {
            die;
        }
        while($ro = $resul->fetch_assoc()) {
            $str = $ro['t_no'];
           // echo "2";
            $val = $_POST[$str];
           if($val != "") {
            //   echo "3";
                $q = "insert into table_details values (\"$str\", \"$val\" , \"$date\")";
                $r = $conn->query($q);
                if(!$r) {
                    $qqqq = "update table_details set e_id = \"$val\" where t_no = \"$str\" and date = \"$date\")";
                    $rrrr = $conn->query($qqqq);
                    if(!$rrrr) {
                        $note ="Check Employee Id!";
                    }
                    else {
                        $note = "";
                    }
                }
                else {
                    $note = "";
                }
            }
        }
    }
   
?>
<html>
	<head>
		<title>Waiter's slot</title>
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
        
        <br><font color="white">
        <center><h1><font size="6">Waiter's Details</h1><br><br></center></font>
        <?php
        $queryy = "select * from employee where role = \"w\"";
        $rr = $conn->query($queryy);
        if($rr->num_rows == 0) {
            echo "<strong><font size=\"6\">No waiters to Dispaly</strong></font>";
        }
        else {
            echo "<table style=\"color:#ffffff\" class=\"table\">
                        <thead class=\"thead-dark\">
                        <tr>
                            <th scope=\"col\">Employee ID</th>
                            <th scope=\"col\">First Name</th>
                            <th scope=\"col\">Last Name</th>
                        </tr>
                        </thead>
                        <tbody>";
                        while($row = $rr->fetch_assoc()) {
                        echo "<tr>
                            <th scope=\"row\">".$row['e_id']."</th>
                            <td>".$row['e_fname']."</td>
                            <td>".$row['e_lname']."</td>
                            </tr>";
                        }
                        echo "</tbody></table>";
            }
        ?>
        <center><h1><font size="6">Waiter's Slot</h1><br><br></center></font>
        <form action="change_waiter.php" method = "POST">
            <?php
                    if($result->num_rows == 0) {
                        echo "<strong><font size=\"6\">No tables to Dispaly</strong></font>";
                        die;
                    }
                    echo "<table style=\"color:#ffffff\" class=\"table\" style=\"width:100%\">
                    <thead class =\"thead-light\">
                        <tr>
                            <th>Table no</th>
                            <th>Employee ID</th>
                        </tr>
                    </thead>
                    <tbody>";
                        while($row = $result->fetch_assoc()) {
                            $tno = $row['t_no'];
                            echo "<tr>
                                <td>".$tno."</td>";
                                echo "<td><input type=\"text\" name=\"$tno\"/></td>";
                            echo "</tr>";

                            
                        }

                    echo "</tbody></table>";
                    echo "<strong><center><font color=\"red\" size=\"4\">".$note."</font></strong></center><br><br>";
                    ?>

                    <center>
                    <div>
                        <button class="btn btn-primary" name ='submit'>Submit</button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="em_info.php"><font color="white">Go back</font></a></button>                        
                    </div>
                </center>
                    </div></div>
            
    </body>
</html>