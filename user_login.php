<?php
    session_start();
    $message = "";
    
    include 'connection.php';
    $conn = OpenCon();    
    $_SESSION["email"] = "";
    $_SESSION["passwd"] = "";
    $_SESSION['cid'] = "";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from customer where email=\"$email\" and passwd=\"$password\"";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['passwd'] = $password;
            $row = $result->fetch_assoc();
            $_SESSION['cid'] = $row['c_id'];
            $message = "Login Successfull";
        }
        else {
            $message = "Invalid email/password";
        }
    }
?>	

<!DOCTYPE html> 
<html> 
    <head>
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
  
    <body> 
        <div class="hero-image4">
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
        <center>
        <h1><font color = "white" size="10">Login Form</h1> </font>
        <!--Step 1 : Adding HTML-->
        <form action="user_login.php" method = "POST">   
            <div class="container"> 
<font color = "white" size = "6">
                <label><b>Email</b></label> <br>
                <input type="text" placeholder="Enter Email" name="email" required> <br><br>

                <label><b>Password</b></label> <br>
                <input type="password" placeholder="Enter Password" name="password" required> <br><br>

                <button type="submit" name='submit'>Login</button> <br>
                <button type="submit" name='submit'><a style="text-decoration:none" href="login.html"><font color="white">Back</a></font></button> <br></form>
                <button type="submit" name='submit'><a style="text-decoration:none" href="user_create.php"><font color="white">Create Account</a></font></button> <br>
                <!--<input type="checkbox" checked="checked"> Remember me -->
            </div> 
            <?php
            echo $message;
            if($message == "Login Successfull") {
                    echo "<script>
                            window.location=\"user_welcome.php\";
                                </script>";
                }
            ?>
    
        </center>
         
            </div>
            </font>
    </body> 
  
</html> 
