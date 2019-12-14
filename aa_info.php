<?php
    session_start();
    include 'connection.php';
    $conn = OpenCon();
    $email = $_SESSION["email"];
    $password = $_SESSION["passwd"];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "select * from admin where email=\"$email\" and passwd = \"$password\"";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if(isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone_no'];
        if(!preg_match("/^[1-9][0-9]{9}$/", $phone)) {
           // echo "Ddd";
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $query = "update admin set a_fname = \"$fname\", a_lname = \"$lname\", 
            street = \"$street\", city=\"$city\", state=\"$state\" where email=\"$email\" and passwd = \"$password\" ";
            $result = $conn->query($query);
            $query = "select * from admin where email=\"$email\" and passwd = \"$password\"";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
        }
        else {
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $query = "update admin set a_fname = \"$fname\", a_lname = \"$lname\", phone_no = \"$phone\", 
            street = \"$street\", city=\"$city\", state=\"$state\" where email=\"$email\" and passwd = \"$password\" ";
            $result = $conn->query($query);
            $query = "select * from admin where email=\"$email\" and passwd = \"$password\"";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
        }
    }
    
?>
<html>
    <head>
		<title>Edit Profile</title>
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
        <!--  has access to number of employees, customers visited per day, summary of all sales (total sales per day/month/year),
         summary of all food items sold per day .add new employees
         view current employee and edit their info.-->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <!------ Include the above in your HEAD tag ---------->
        <center>
        
            <h1><font color="white" size="8">Profile Details<br><br></h1></font>
                <form id="tab" action="aa_info.php" method = "POST">
                    <div class="container">
                    <font color="white" size="6">
                    <label>First Name</label>
                    <input type="text" maxlength = "20" value="<?php echo $row['a_fname']; ?>" class="input-xlarge" name="fname"><br><br>
                    <label>Last Name</label>
                    <input type="text" maxlength = "20" value="<?php echo $row['a_lname']; ?>" class="input-xlarge" name="lname"><br><br>
                    <label>Phone No</label>
                    <input type="text" maxlength = "10" value="<?php echo $row['phone_no']; ?>" class="input-xlarge" name="phone_no"><br><br>
                    <label>Email</label>
                    <input type="text" maxlength = "50" value="<?php echo $row['email']; ?>" class="input-xlarge" disabled="disabled"><br><br>
                    <label>Street</label>
                    <input type="text" maxlength = "50" value="<?php echo $row['street']; ?>" class="input-xlarge" name="street"><br><br>
                    <label>City</label>
                    <input type="text" maxlength = "50" value="<?php echo $row['city']; ?>" class="input-xlarge" name="city"><br><br>
                    <label>State</label>
                    <input type="text" maxlength = "50" value="<?php echo $row['state']; ?>" class="input-xlarge" name="state"><br><br><br><br></font>
                    <div>
                        <button class="btn btn-primary" name ="update">Update</button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="a_change_pwd.php"><font color="white">Change Password</font></a></button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="admin_login.php"><font color="white">Logout</a></button><br><br></font>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="a_info.php"><font color="white">Back</a></button>      </font>                  
                    </div>
                </form>
        </div>
        </div>
       
        </center>
    </body>     
</html>