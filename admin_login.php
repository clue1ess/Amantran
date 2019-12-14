<?php
    session_start();
    $message = "";
    include 'connection.php';
    $conn = OpenCon();
    $_SESSION["email"] = "";
    $_SESSION["passwd"] = "";

   
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
       // var_dump($role);
        $query = "select * from admin where email=\"$email\" and passwd=\"$password\"";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['passwd'] = $password;
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
    <div class="hero-image2">
		<title>Admin Login</title>
        <link rel="stylesheet" href="style.css">
	</head>
  
    <body> 
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
        <center><br><br>
        <h1><font color="white" size = "10">Login Form</h1> <br></font>
        <!--Step 1 : Adding HTML-->
      <form action="admin_login.php" method = "POST">   
      <div class="container">
        <font color="white" size ="6">
                <label><b>Email</b></label> <br>
                <input type="text" style="border:none" placeholder="Enter Email" name="email" required> <br><br>

                <label><b>Password</b></label> <br>
                <input type="password" style="border:none" placeholder="Enter Password" name="password" required> <br><br>

                <button type="submit" style="border:none" name='submit' class="btn btn-success">Login</button> <br>
                <button type="button" class="btn btn-success"><a style="text-decoration:none" href="login.html"><font color="white">Back</font></a></button><br><br>
                <!--<input type="checkbox" checked="checked"> Remember me -->
</font>
            <?php
                echo  "<font color=\"white\">".$message."</font>";
                if($message == "Login Successfull") {
                    echo "<script>
                            window.location=\"a_info.php\";
                        </script>";
                }
                //manager - em_info
                //others  - e_info*/
            ?>
    </div>
        </center>
        </form> 
  
    </body> 
            </div>
  
</html> 
