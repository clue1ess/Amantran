<?php
  session_start();
  include 'connection.php';
  $conn = OpenCon();
    $email = $_SESSION["email"];
    $password = $_SESSION["passwd"];
    $fnameerr ="";
    $lnameerr = "";
    $phnerr = "";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "select * from customer where email=\"$email\" and passwd = \"$password\"";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
 //   $row = $result->fetch_assoc();
    if(isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone_no'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        if(!preg_match("/^[a-zA-Z ]*$/",$fname )) {
            $fnameerr = "Only aplhabets are allowed";
        }
        else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
            $lnameerr = "Only aplhabets are allowed";
        }
        else if(!preg_match("/^[1-9][0-9]{9}$/",$phone)) {
            $phnerr = "Enter 10-digit mob no";
        }
        else {
        $query = "update customer set c_fname = \"$fname\", c_lname = \"$lname\", phone_no = \"$phone\", 
        street = \"$street\", city=\"$city\", state=\"$state\" where email=\"$email\" and passwd = \"$password\" ";
        $result = $conn->query($query);
        $query = "select * from customer where email=\"$email\" and passwd = \"$password\"";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        }
    }
?>
<!DOCTYPE html>
<html>
	
 <head>
		<title>Customer</title>
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
	<!--<center><font color="#000000" face = "Arial"><h1 style="font-size:50px">WELCOME @c_name!!</h1></font></center><br></br> 	
	<div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
	<center><h3>To the World of Veg</h3></center><br>
	</div>-->

        <script src="script.js"></script>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <center><font color="white">
            <h1><font size="8">Profile Details</h1><br></br></font>
                <form id="tab" action="user_edit.php" method = "POST">
                <div class="container">
                <font size="6">
                    <label>First Name</label>
                    <input type="text" maxlength="20" value="<?php echo $row['c_fname']; ?>" class="input-xlarge" name="fname">
                    <br> <?php echo "<font color=\"red\" size=\"4\">".$fnameerr."</font>";?><br>
                    <label>Last Name</label>
                    <input type="text" maxlength="20" value="<?php echo $row['c_lname']; ?>" class="input-xlarge" name="lname">
                    <br> <?php echo "<font color=\"red\" size=\"4\">".$lnameerr."</font>";?><br>
                    <label>Phone No</label>
                    <input type="text" maxlength="10" value="<?php echo $row['phone_no']; ?>" class="input-xlarge" name="phone_no">
                    <br> <?php echo "<font color=\"red\" size=\"4\">".$phnerr."</font>";?><br>
                    <label>Email</label>
                    <input type="text" maxlength="50" value="<?php echo $row['email']; ?>" class="input-xlarge" disabled="disabled">
                    <label>Street</label>
                    <input type="text" maxlength="50" value="<?php echo $row['street']; ?>" class="input-xlarge" name="street">
                    <label>City</label>
                    <input type="text" maxlength="50"value="<?php echo $row['city']; ?>" class="input-xlarge" name="city">
                    <label>State</label>
                    <input type="text" maxlength="50"value="<?php echo $row['state']; ?>" class="input-xlarge" name="state"><br><br></font>
                    <div>
                        <button class="btn btn-primary" name ="update">Update</button><br></br>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="c_change_pwd.php"><font color="white">Change Password</font></a></button><br></br>
			<!--<button type="button" class="btn btn-primary"><a style="text-decoration:none" href="book_table.php"><font color="white">Book Table</font></a></button><br></br> -->              
	<button type="button" class="btn btn-primary"><a style="text-decoration:none" href="user_welcome.php"><font color="white">Back</font></a></button><br></br>
                    </div>
                </form>
                </div>
        </div>
        </center></font>
    </body>
   
</html>

