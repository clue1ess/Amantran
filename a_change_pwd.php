<?php

    session_start();
    $email = $_SESSION["email"];
    $password = $_SESSION["passwd"];
    $message = "";
    include 'connection.php';
    $conn = OpenCon();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['ok'])) {
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];
        if($pwd1 == $pwd2) {
            $query = "update admin set passwd = \"$pwd1\" where email = \"$email\" and passwd=\"$password\"";
            $result = $conn->query($query);
            $message = "Password Changed Succesfully";
        }
        else {
            $message = "Passwords Don't match. Re-enter the password.";
        }
    }
?>
<html>
    <head>
		<title>change password</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
        <div class ="hero-image6">
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
        <!------ Include the above in your HEAD tag ---------->
        <center>
            <h1><font color = "white" size = "8"><br>Password Update<br><br></font></h1>
                <form id="tab" action="a_change_pwd.php" method = "POST">
                <font color = "white" size = "6">
                    <div class ="container">
                    <label>New Password</label>
                    <input type="password" class="input-xlarge" name="pwd1"><br><br>
                    <label>Confirm New Password</label>
                    <input type="password" class="input-xlarge" name="pwd2"><br><br><br>
                    <div>
                        <button class="btn btn-primary" name ="ok">Submit</button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="aa_info.php"><font color="white">Back</font></a></button><br><br> 
                        <?php
                            echo $message;
                        ?>
</font>
                    </div>
</div></form>
</div>
        </center>
    </body>
</html>