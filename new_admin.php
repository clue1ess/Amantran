<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "rms";
    $fnameerr = "";
    $lnameerr = "";
    $phnerr = "";
    $emailerr = "";
    $pwderr = "";
    $fname = "";
    $lname = "";
    $street = "";
    $city = "";
    $state = "";
    $email = "";
    $pwd1 = "";
    $pwd2 = "";
    $phone = "";
    $msg = "";

    $conn = new mysqli ($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['add'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $pwd1 = $_POST['passwd1'];
        $pwd2 = $_POST['passwd2'];
        $phone = $_POST['phone_no'];
        //validate phone no and email and name 
        if(!preg_match("/^[a-zA-Z ]*$/",$fname )) {
            $fnameerr = "Only aplhabets are allowed";
        }
        else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
            $lnameerr = "Only aplhabets are allowed";
        }
        else if(!preg_match("/^[1-9][0-9]{9}$/",$phone)) {
            $phnerr = "Enter 10-digit mob no";
        }
        else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)) {
            $emailerr = "Enter proper email address";
        }
        else if($pwd1 != $pwd2) {
            $pwderr = "Passwords didn't match!";
        }
        else {  
            $fnameerr = "";
            $lnameerr = "";
            $phnerr = "";
            $emailerr = "";
            $pwderr = "";  
            //echo "jdc";    
            $q = "insert into admin values (\"NULL\", \"$fname\", \"$lname\", \"$email\", \"$phone\", \"$pwd1\", \"$street\", \"$city\", \"$state\")";
            $r = $conn->query($q);
            //var_dump($r);
            if($r) {
                $msg = "Admin Added Successfully";
                $fname = "";
                $lname = "";
                $street = "";
                $city = "";
                $state = "";
                $email = "";
                $pwd1 = "";
                $pwd2 = "";
                $phone = "";
            }
        }

    }
    
?>
<html>
    <head>
		<title>New Admin</title>
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
        <!--  has access to number of employees, customers visited per day, summary of all sales (total sales per day/month/year),
         summary of all food items sold per day .add new employees
         view current employee and edit their info.-->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <center>
            <h1><font color="white" size="8">Profile Details<br><br></h1></font>
           
                <form id="tab" action="new_admin.php" method = "POST">
                <div class="container">
                    <font color="white" size="6">
                    <label>First Name</label>
                    <input type="text" maxlength = "20" placeholder="Enter First Name" class="input-xlarge" name="fname" value = "<?php echo $fname;?>" required>
                   <br> <?php echo "<font color=\"red\" size=\"4\">".$fnameerr."</font>";?><br>
                    <label>Last Name</label>
                    <input type="text" maxlength = "20" placeholder="Enter Last Name" class="input-xlarge" name="lname" value = "<?php echo $lname;?>" required>
                    <br><?php echo "<font color=\"red\" size=\"4\">".$lnameerr."</font>";?><br>
                    <label>Phone No</label>
                    <input type="text" maxlength = "10" placeholder="Enter Mobile No" class="input-xlarge" name="phone_no" value = "<?php echo $phone;?>" required>
                    <br><?php echo "<font color=\"red\" size=\"4\">".$phnerr."</font>";?><br>
                    <label>Email</label>
                    <input type="text" maxlength = "50"placeholder="Enter Email" class="input-xlarge" name="email" value = "<?php echo $email;?>" required>
                   <br> <?php echo "<font color=\"red\" size=\"4\">".$emailerr."</font>";?><br>
                    <label>Password</label>
                    <input type="Password" maxlength = "50"class="input-xlarge" name="passwd1" required>
                    <label>Confirm Password</label>
                    <input type="Password" maxlength = "50"class="input-xlarge" name="passwd2" required>
                    <br><?php echo "<font color=\"red\" size=\"4\">".$pwderr."</font>";?><br>
                    <label>Street</label>
                    <input type="text" maxlength = "50"placeholder="Enter Street" class="input-xlarge" name="street" value = "<?php echo $street;?>" required>
                    <label>City</label>
                    <input type="text" maxlength = "50"placeholder="Enter City" class="input-xlarge" name="city" value = "<?php echo $city;?>" required>
                    <label>State</label>
                    <input type="text" maxlength = "50" placeholder="Enter State" class="input-xlarge" name="state" value = "<?php echo $state;?>" required><br><br>
                    <div>
                        <button class="btn btn-primary" name ="add">Add</button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="a_info.php"><font color="white">Go back</font></a></button>                        
                    </div>
                    <?php
                        echo "<br>".$msg;
                    ?>
                </form>
</font>
        </div>
        </center>
    </body>     
</html>